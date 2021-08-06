@extends('layouts.admin')
@section('title', 'Tambah Kelas')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Tambah Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('adminkelas.index') }}">Kelas</a></div>
                <div class="breadcrumb-item active">Tambah Kelas</div>
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
        <div class="row justify-content-start">
            <div class="col-md-8">
                <form action="{{ route('adminkelas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label>Nama Kelas:</label>
                            <input type="text" class="form-control" name="nama_kelas" value="{{ old('nama_kelas') }}" placeholder="Masukan nama kelas...">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail :</label>
                            <input type="file" class="form-control-file" name="gambar" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Kategori :</label>
                            <div class="input-group">
                                <select class="form-control" name="id_kategori">
                                    <option value="">Pilih</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" name="harga"
                                    placeholder="Masukan nominal harga..." value="{{ old('harga') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi :</label>
                            <textarea class="form-control" id="editor" name="deskripsi"
                                placeholder="Masukan deskripsi kelas..." value="{{ old('deskripsi') }}">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Tipe :</label>
                            <select class="form-control" name="tipe">
                                <option>Pilih</option>
                                <option value="Aktif">Gratis</option>
                                <option value="Berbayar">Berbayar</option>
                                <option value="Berlangganan">Berlangganan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control" name="status">
                                <option>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Belum Aktif">Belum Aktif</option>
                                <option value="On Progress">On Progress</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
