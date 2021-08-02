@extends('layouts.admin')
@section('title', 'Beranda')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')
<section class="section">

    @if (session('message'))
    <div class="alert @if (session('status')) {{ session('status') }} @endif alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <i class="fas fa-check mr-2"></i>
            {{ session('message') }}
        </div>
    </div>
    @endif

    <div class="row mt-sm-4 justify-content-start">
        <div class="col-12 col-md-8">
            <div class="card card-body">
                <form action="{{ route('beranda.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="id_pelanggan">
                        <input type="hidden" value="<?php date_default_timezone_set('Asia/Jakarta');
echo date('Y-m-d\ H:i:s'); ?>" class="form-control" name="waktu">
                        <label class="col-form-label col-12 col-md-12 col-lg-3"><i class="fas fa-pen"></i>
                            Status</label>
                        <div class="col-12">
                            <textarea class="form-control" name="status"
                                placeholder="Apa yang Anda Pikirkan Sekarang?"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            @forelse ($data as $item)
            <div class="card card-body mb-3" loading="lazy">
                <div class="row justify-content-start mb-3">
                    <div class="col-auto">
                        <img src="{{ asset('photo/' . $item->member->photo) }}" class="rounded" height="50px">
                    </div>
                    <div class="col-auto mt-1" style="margin-left:-20px;">
                        <a class="font-weight-bold">{{ $item->member->name }}</a><br>
                        <a class="font-weight-light" style="font-size:11px">{{ $item->waktu }}<i
                                class="far fa-clock"></i></a>
                    </div>
                    <p class="col-12 mt-3" style="line-height:normal;">
                        {{ $item->status }}
                    </p>
                    <div class="col-12 collapse" id="editPost{{ $item->id }}">
                        <form action="{{ route('beranda.update',$item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                        <input type="hidden" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d\ H:i:s'); ?>" class="form-control" name="waktu">
                            <textarea class="form-control" name="status"
                                value="{{ $item->status }}">{{ $item->status }}</textarea>
                            <div class="form-group row mt-2">
                                <div class="col-12 text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-redo"></i>
                                        Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn" data-toggle="collapse"
                            data-target="#komentar{{ $item->id }}"><i class="fas fa-comment"></i><span
                                class="bg-info rounded text-white px-1"
                                style="font-size:9px">{{ $item->komentar()->count() }}</span></button>
                        @if (Auth::user()->id === $item->id_pelanggan)
                        <button type="button" class="btn" data-toggle="collapse"
                            data-target="#editPost{{ $item->id }}"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('beranda.destroy', $item->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                        </form>
                        @endif
                    </div>
                    <div class="col-12 collapse" id="komentar{{ $item->id }}">
                        <hr>
                        @forelse ($item->komentar as $komen)
                        <div class="row mb-2">
                            <div class="col-auto">
                                <img src="{{ asset('photo/' . $komen->member->photo) }}" class="rounded-circle"
                                    height="40px">
                            </div>
                            <div class="col-auto" style="margin-left:-20px;">
                                <a class="font-weight-bold">{{ $komen->member->name }}</a><br>
                                <a class="font-weight-light" style="font-size:11px">{{ $komen->waktu }}<i
                                        class="far fa-clock"></i></a>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row justify-content-center">
                                    <div class="col-10 bg-welas px-2 rounded">
                                        <p style="line-height:normal;" class="pt-2">{{ $komen->komentar }}</p>
                                        @if (Auth::user()->id === $komen->id_pelanggan)
                                        <form action="{{ route('komentar.update',$komen->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('PATCH')
                                            <div class="collapse" id="editKomentar{{ $komen->id }}">
                                                <textarea class="form-control" name="komentar"
                                                value="{{ $komen->komentar }}">{{ $komen->komentar }}</textarea>
                                            </div>
                                            <button type="submit" class="btn"><i class="fas fa-redo"></i></button>
                                        </form>
                                        <button type="button" class="btn" data-toggle="collapse"
                                            data-target="#editKomentar{{ $komen->id }}"><i class="fas fa-edit"></i></button>
                                        <form action="{{ route('komentar.destroy', $komen->id) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">Belum ada komentar</p>
                        @endforelse
                        <div class="form-group mt-3">
                            <form action="{{ route('komentar.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id_status">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="id_pelanggan">
                                <input type="hidden"
                                    value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d\ H:i:s'); ?>"
                                    name="waktu">
                                <textarea class="form-control" name="komentar"
                                    placeholder="Tulis komentar disini.."></textarea>
                                <button type="submit" class="btn btn-primary btn-block mt-2"><i
                                        class="fas fa-comment"></i> Kirim
                                    komentar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
        <div class="col-md-3 d-none d-md-block event card card-body">
            @foreach ($informasi as $info)
            <div class="card">
                <iframe class="card-img-top" loading="lazy" src="https://www.youtube.com/embed/{{ $info->video }}" allow="autoplay" title="{{ $info->judul }}" frameborder="0" allowfullscreen></iframe>
            </div>
            @endforeach
            @foreach ($iklan as $konten)
                <div class="card">
                    <a href="{{ $konten->link }}" target="_blank"><img class="card-img-top" src="{{ asset('gambar/' . $konten->gambar) ?? '' }}" loading="lazy"></a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</section>
@endsection