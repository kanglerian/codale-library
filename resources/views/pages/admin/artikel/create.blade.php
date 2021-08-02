@extends('layouts.admin')
@section('title', 'Tambah Artikel')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tulis Artikel</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('article.index') }}">Artikel</a></div>
            <div class="breadcrumb-item active">Tulis Artikel</div>
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
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Thumbnail :</label>
                        <input type="file" class="form-control-file" name="gambar" accept="image/*">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Judul Artikel :</label>
                        <input type="text" class="form-control" name="judul_artikel" placeholder="Masukan Judul Artikel disini...">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Kategori :</label>
                        <select name="id_kategori" class="form-control">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="isi" id="editor"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</section>
@endsection