@extends('layouts.admin')
@section('title', 'Kelas Online')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $item->nama_kelas }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('adminkelas.index') }}">Kelas</a></div>
            <div class="breadcrumb-item active">Detail Kelas</div>
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
            <div class="col-12 col-md-8 mb-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item rounded-triple" id="videoLive"
                        src="https://www.youtube.com/embed/renl8dYqTKA" allowfullscreen></iframe>
                </div>
                <hr>
                <p>{!! $item->deskripsi !!}</p>
            </div>
            <div class="col-12 col-md-4">
                <ul class="list-group mb-3">
                    <div class="row">
                        <div class="col-7">
                            <li class="list-group-item border-0 fs-4" id="videoItem"><button
                                    class="btn btn-success btn-block rounded-double fs-5"><i
                                        class="fas fa-plus mr-1"></i>
                                    Tambah Video</button>
                        </div>
                        <div class="col-5">
                            <li class="list-group-item border-0 fs-4"><a href="{{ route('detailkelas.index') }}"
                                    class="btn btn-primary btn-block rounded-double fs-5"><i
                                        class="fas fa-cogs mr-1"></i>
                                    Studio</a>
                        </div>
                    </div>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item border-0 fs-4" id="videoItem"><button
                            class="btn btn-primary btn-block text-left rounded-double fs-5">1. Pengenalan Figma</button>
                    </li>
                    <li class="list-group-item border-0 fs-4" id="videoItem"><button
                            class="btn btn-primary btn-block text-left rounded-double fs-5">2. Frame dan Color</button>
                    </li>
                    <li class="list-group-item border-0 fs-4" id="videoItem">
                        <button class="btn btn-primary btn-block text-left rounded-double fs-5">3. Background
                            dan Pen Tools</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection