@extends('layouts.admin')
@section('title', 'Artikel')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Artikel</h1>
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
            <a href="{{ route('article.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Tambah
                Artikel</a>
        </div>
    </div>
    <hr>

    <div class="row">
        @foreach ($data as $item)
        <!-- Product -->
        <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
            <div class="card card-body shadow-sm">
                <div class="text-center">
                    <a href="{{ route('artikel.show',$item->id) }}">
                        @if ($item->gambar)
                        <img src="{{ asset('gambar/' . $item->gambar) }}" loading="lazy" class="img-fluid" />
                        @else
                        <img src="{{ asset('img-more/img01.jpg') }}" loading="lazy" class="img-fluid" />     
                        @endif
                    </a>
                </div>
                <h6 class="book-title mt-4 mb-3">
                    <b>{{ $item->judul_artikel }}</b>
                </h6>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <button type="button" data-target="#tambahMedia" data-toggle="collapse"
                            class="btn btn-primary btn-sm rounded-double px-2">
                            <i class="fas fa-plus mr-1"></i> Tambah Media
                        </button>
                        <a href="{{ route('article.edit',$item->id) }}"
                            class="btn btn-warning btn-sm rounded-double px-2">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <a href="{{ route('article.edit',$item->id) }}"
                            class="btn btn-danger btn-sm rounded-double px-2">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </a>
                    </div>
                </div>
                <div class="row collapse mt-2" id="tambahMedia">
                    <div class="col-12">
                        <hr>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label><i class="fas fa-dot-circle mr-1"></i> Judul</label>
                                <input type="text" class="form-control">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><i class="fas fa-dot-circle mr-1"></i> Audio</label>
                                <input type="file" class="form-control-file">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><i class="fas fa-dot-circle mr-1"></i> Gambar</label>
                                <input type="file" class="form-control-file">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-block btn-sm">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product -->
        @endforeach
    </div>
</section>
@endsection