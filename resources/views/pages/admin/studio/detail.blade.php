@extends('layouts.admin')
@section('title', 'Codale Creator Detail')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $item->judul }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('detailkelas.index') }}">Studio</a></div>
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
                <form action="{{ route('detailkelas.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label>Judul:</label>
                            <input type="text" class="form-control" name="judul" value="{{ $item->judul }}"
                                placeholder="Tambahkan judul video untuk menjelaskan video anda...">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi :</label>
                            <textarea class="form-control" id="editor" name="keterangan"
                                placeholder="Masukan deskripsi video anda..."
                                value="{{ $item->keterangan }}">{{ $item->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail :</label>
                            <input type="file" class="form-control-file" name="thumbnail" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Kode Video:</label>
                            <input type="text" class="form-control" name="kode_video" value="{{ $item->kode_video }}"
                                placeholder="Masukan kode video...">
                        </div>
                        <div class="form-group">
                            <label>Kelas :</label>
                            <div class="input-group">
                                <select class="form-control" name="id_kelas">
                                    <option value="{{ $item->id_kelas }}">{{ $item->kelas->nama_kelas ?? 'Belum ada' }}
                                    </option>
                                    @forelse ($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Creator :</label>
                            <div class="input-group">
                                <select class="form-control" name="id_creator">
                                    <option value="{{ $item->id_creator }}">{{ $item->creator->name }}</option>
                                    @foreach ($creator as $crt)
                                    <option value="{{ $crt->id }}">{{ $crt->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                </form>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item rounded" id="videoLive"
                            src="https://www.youtube.com/embed/{{ $item->kode_video }}" allowfullscreen></iframe>
                    </div>
                    <small class="mt-3">Link Video</small>
                    <a href="https://youtu.be/{{ $item->kode_video }}"
                        style="text-decoration: none">https://youtu.be/{{ $item->kode_video }}</a>
                    <hr>
                    <form action="{{ route('detailkelas.destroy',$item->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection