@extends('layouts.admin')
@section('title', 'Tambah Buku')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Tambah Buku</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('buku.index') }}">Katalog</a></div>
                <div class="breadcrumb-item active">Tambah Buku</div>
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
            <div class="col-md-8">
                <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ISBN / Kode Buku:</label>
                            <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" placeholder="Masukan ISBN...">
                        </div>
                        <div class="form-group">
                            <label>Judul Buku :</label>
                            <input type="text" class="form-control" name="judul_buku"
                                placeholder="Masukan judul buku..." value="{{ old('judul_buku') }}">
                        </div>
                        <div class="form-group">
                            <label>Cover Buku :</label>
                            <input type="file" class="form-control-file" name="cover" accept="image/*">
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
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseTambahKategori"><i class="fas fa-window-minimize"></i></i></button>
                                </div>
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
                            <textarea class="form-control" name="deskripsi"
                                placeholder="Masukan deskripsi buku..." value="Tidak ada keterangan">Tidak ada keterangan</textarea>
                        </div>
                        <div class="form-group">
                            <label>Penulis :</label>
                            <div class="input-group">
                                <select class="form-control" name="id_penulis">
                                    <option value="">Pilih</option>
                                    @foreach ($penulis as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_penulis }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseTambahPenulis"><i class="fas fa-window-minimize"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Penerbit :</label>
                            <div class="input-group">
                                <select class="form-control" name="id_penerbit">
                                    <option value="">Pilih</option>
                                    @foreach ($penerbit as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseTambahPenerbit"><i class="fas fa-window-minimize"></i></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control" name="status">
                                <option>Pilih</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Hilang">Hilang</option>
                                <option value="Hilang">Kembali</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="collapse show" id="collapseTambahKategori">
                    <div class="card card-body">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tambah Kategori :</label>
                                    <input type="text" class="form-control" name="nama_kategori"
                                        placeholder="Masukan kategori...">
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="collapse show" id="collapseTambahPenulis">
                    <div class="card card-body">
                        <form action="{{ route('penulis.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tambah Penulis :</label>
                                    <input type="text" class="form-control" name="nama_penulis"
                                        placeholder="Masukan penulis...">
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="collapse show" id="collapseTambahPenerbit">
                    <div class="card card-body">
                        <form action="{{ route('penerbit.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tambah Penerbit :</label>
                                    <input type="text" class="form-control" name="nama_penerbit"
                                        placeholder="Masukan penerbit...">
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
