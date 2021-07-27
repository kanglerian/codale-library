@extends('layouts.admin')
@section('title', 'Profil Penerbit')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profil Penerbit</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('buku.index') }}">Katalog</a></div>
                <div class="breadcrumb-item"><a href="{{ route('penerbit.index') }}">Penerbit</a></div>
                <div class="breadcrumb-item active">Profil Penerbit</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $item->nama_penerbit }}</h2>
            <p class="section-lead">
                {{ $item->bidang }}
            </p>
            <p>{{ $item->keterangan }}</p>
            <hr>
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseEditPenerbit"><i class="fas fa-eye"></i> Detail</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusPenerbit"><i class="fas fa-trash"></i> Hapus</button>
            <hr>
            <div class="collapse" id="collapseEditPenerbit">
                <div class="card card-body">
                    <form action="{{ route('penerbit.update',$item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Penerbit</label>
                                <input type="text" class="form-control" name="nama_penerbit" value="{{ $item->nama_penerbit }}">
                            </div>
                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" class="form-control" name="bidang" value="{{ $item->bidang }}">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" value="{{ $item->keterangan }}">{{ $item->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="row">
                    @forelse ($buku as $item)
                            <div class="col-12 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ $item->cover }}" alt="" class="img-fluid mb-3" loading="lazy">
                                        <a href="{{ route('buku.show',$item->id) }}" class="btn btn-primary btn-block"><i class="fas fa-eye"></i> Lihat</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center btn btn-danger btn-block">Buku belum tersedia</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="modalHapusPenerbit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h4>Beneran mau dihapus?</h4>
                        <p>Hapus aja gakpapa kok nanti bikin lagi..</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center" style="margin-top: -20px;margin-bottom:10px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route('penerbit.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
