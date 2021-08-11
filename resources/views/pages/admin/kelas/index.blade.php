@extends('layouts.admin')
@section('title', 'Kelas Online')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Kelas Online</h1>
        </div>
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
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ route('adminkelas.create') }}" class="btn btn-primary"><i
                        class="far fa-edit"></i> Tambah Kelas</a>
            </div>
        </div>
        <hr>

        <div class="row">
            @forelse ($data as $item)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <a href="{{ route('adminkelas.show',$item->id) }}">
                            @if ($item->gambar)
                                <img src="{{ asset('gambar/'.$item->gambar) }}" loading="lazy" class="card-img-top">
                            @else
                                <img src="{{ asset('img-more/img01.jpg') }}" loading="lazy" class="card-img-top">
                            @endif
                        </a>
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto text-left">
                                    <h6>{{ $item->nama_kelas }}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-auto">
                                    @if ($item->pelanggan->photo)
                                    <img src="{{ asset('photo/' . $item->pelanggan->photo) }}" class="rounded-circle" height="40px">
                                    @else
                                    <img src="{{ asset('img-more/avatar-1.png') }}" class="rounded-circle" height="40px">
                                    @endif
                                </div>
                                <div class="col-auto mt-2" style="margin-left:-20px;">
                                    <a class="font-weight-bold fs-3">{{ $item->pelanggan->name }}</a><br>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-between mt-2">
                                <div class="col-auto">
                                    <a href="{{ route('adminkelas.show',$item->id) }}" class="btn btn-primary btn-sm px-3"><i class="fas fa-laptop-code mr-1"></i> Lihat kelas</a>
                                </div>
                                <div class="col-auto text-right">
                                    @if ($item->status == 'Aktif')
                                        <form action="{{ route('adminkelas.update',$item->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Belum Aktif">
                                            <button type="submit" class="btn btn-success btn-sm">Aktif</button>
                                        </form>
                                    @elseif($item->status == "Belum Aktif")
                                    <form action="{{ route('adminkelas.update',$item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="On Progress">
                                        <button type="submit" class="btn btn-danger btn-sm">Belum Aktif</button>
                                    </form>
                                    @elseif($item->status == "On Progress")
                                    <form action="{{ route('adminkelas.update',$item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Aktif">
                                        <button type="submit" class="btn btn-warning btn-sm">On Progress</button>
                                    </form>
                                    @endif
                                    <a href="{{ route('adminkelas.edit',$item->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('adminkelas.destroy',$item->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-danger text-center fs-4" role="alert">
                        Kelas Belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
