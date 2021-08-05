@extends('layouts.admin')
@section('title', 'Edit Kelas')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Edit Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('class.index') }}">Kelas</a></div>
                <div class="breadcrumb-item active">Edit Kelas</div>
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
            <div class="col-12">
                <form action="{{ route('class.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label>Nama Kelas:</label>
                                <input type="text" class="form-control" name="nama_kelas" value="{{ $item->nama_kelas }}">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label>Author :</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_pelanggan">
                                        <option value="{{ $item->id_pelanggan }}">{{ $item->pelanggan->name }}</option>
                                        @foreach ($author as $auth)
                                            <option value="{{ $auth->id }}">{{ $auth->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label>Kategori :</label>
                                <div class="input-group">
                                    <select class="form-control" name="id_kategori">
                                        <option value="{{ $item->id_kategori }}">{{ $item->kategori->nama_kategori }}</option>
                                        @foreach ($kategori as $ktg)
                                            <option value="{{ $ktg->id }}">{{ $ktg->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail :</label>
                            <input type="file" class="form-control-file" name="gambar" accept="image/*">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label>Harga :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" name="harga" value="{{ $item->harga }}">
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label>Tipe :</label>
                                <select class="form-control" name="tipe">
                                    <option value="{{ $item->tipe }}">{{ $item->tipe }}</option>
                                    <option value="Aktif">Gratis</option>
                                    <option value="Berbayar">Berbayar</option>
                                    <option value="Berlangganan">Berlangganan</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label>Status :</label>
                                <select class="form-control" name="status">
                                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Belum Aktif">Belum Aktif</option>
                                    <option value="Prosess">Prosess</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi :</label>
                            <textarea class="form-control" id="editor" name="deskripsi" value="{!! $item->deskripsi !!}">{!! $item->deskripsi !!}</textarea>
                        </div>
                        <div class="form-row">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
