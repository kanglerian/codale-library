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
                <a href="{{ route('class.create') }}" class="btn btn-primary"><i
                        class="far fa-edit"></i> Tambah Kelas</a>
            </div>
        </div>
        <hr>

        <div class="row">
            @forelse ($data as $item)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <a href="{{ route('class.show',$item->id) }}"><img src="{{ asset('gambar/'.$item->gambar) }}" loading="lazy" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto text-left">
                                    <h6>{{ $item->nama_kelas }}</h6>
                                    {{-- <p><span class="badge badge-success">{{ $item->tipe }}</span></p> --}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-auto">
                                    <img src="{{ asset('photo/' . $item->pelanggan->photo) }}" class="rounded-circle" height="40px">
                                </div>
                                <div class="col-auto mt-2" style="margin-left:-20px;">
                                    <a class="font-weight-bold fs-3">{{ $item->pelanggan->name }}</a><br>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-between mt-2">
                                <div class="col-auto">
                                    <a href="{{ route('class.show',$item->id) }}" class="btn btn-primary btn-sm px-3"><i class="fas fa-laptop-code mr-1"></i> Lihat kelas</a>
                                </div>
                                <div class="col-auto text-right">
                                    @if ($item->status == 'Aktif')
                                        <form action="{{ route('class.update',$item->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Belum Aktif">
                                            <button type="submit" class="btn btn-success btn-sm">Aktif</button>
                                        </form>
                                    @elseif($item->status == "Belum Aktif")
                                    <form action="{{ route('class.update',$item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="On Progress">
                                        <button type="submit" class="btn btn-danger btn-sm">Belum Aktif</button>
                                    </form>
                                    @elseif($item->status == "On Progress")
                                    <form action="{{ route('class.update',$item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Aktif">
                                        <button type="submit" class="btn btn-warning btn-sm">On Progress</button>
                                    </form>
                                    @endif
                                    <a href="{{ route('class.edit',$item->id) }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('class.destroy',$item->id) }}" method="POST"
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
                    <p class="text-center">Belum ada infromasi.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
