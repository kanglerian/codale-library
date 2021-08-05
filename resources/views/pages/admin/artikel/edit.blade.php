@extends('layouts.admin')
@section('title', 'Edit Artikel')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Artikel</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('article.index') }}">Artikel</a></div>
            <div class="breadcrumb-item active">Edit Artikel</div>
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
    <div class="row">
        <div class="col-12">
            <form action="{{ route('article.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Thumbnail :</label>
                        <input type="file" class="form-control-file" name="gambar" accept="image/*">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Judul Artikel :</label>
                        <input type="text" class="form-control" name="judul_artikel" value="{{ $item->judul_artikel }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Kategori :</label>
                        <select name="id_kategori" class="form-control">
                            <option value="{{ $item->id_kategori }}">{{ $item->kategori->nama_kategori }}</option>
                            @foreach ($kategori as $ktg)
                                <option value="{{ $item->id }}">{{ $ktg->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="isi" id="editor">{!!$item->isi!!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection