@extends('layouts.admin')
@section('title', 'Podcast Detail')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $item->judul }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('audio.index') }}">Podcast</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
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
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('audio.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Audio :</label>
                            <input type="file" class="form-control-file" name="audio">
                        </div>
                        <div class="form-group">
                            <label>Judul:</label>
                            <input type="text" class="form-control" name="judul" value="{{ $item->judul }}"
                                placeholder="Tambahkan judul video untuk menjelaskan video anda...">
                        </div>
                        <div class="form-group">
                            <label>Artikel :</label>
                            <select name="id_kategori" class="form-control">
                                <option value="{{ $item->id_artikel }}">{{ $item->artikel->judul_artikel ?? 'Pilih' }}
                                </option>
                                @foreach ($artikel as $art)
                                <option value="{{ $art->id }}">{{ $art->judul_artikel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan :</label>
                            <textarea class="form-control" id="editor" name="keterangan"
                                placeholder="Masukan deskripsi video anda..."
                                value="{{ $item->keterangan }}">{{ $item->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control" name="status">
                                <option value="{{ $item->status }}">{{ $item->status }}</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Belum Aktif">Belum Aktif</option>
                                <option value="On Progress">On Progress</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-body">
                    <img src="{{ asset('gambar/'.$item->thumbnail) }}" class="img-fluid rounded">
                    <div class="form-group mt-2">
                        <label>Thumbnail :</label>
                        <input type="file" class="form-control-file" name="thumbnail" accept="image/*">
                    </div>
                    <hr>
                    <audio controls>
                        <source src="{{ asset('podcast/'.$item->audio) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection