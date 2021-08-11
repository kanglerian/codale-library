@extends('layouts.admin')
@section('title', 'Profil')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profil Penulis</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('penulis.index') }}">Penulis</a></div>
                <div class="breadcrumb-item active">Profil Penulis</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hai, saya {{ $item->nama_penulis }}</h2>
            <p class="section-lead">
                {{ $item->profesi }}
            </p>

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

            <div class="row mt-sm-4">
                <div class="col-12 col-md-6">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if ($item->photo)
                            <img src="{{ asset('photo/'.$item->photo)}}"
                                class="rounded-circle profile-widget-picture img-thumbnail" loading="lazy">
                            @else
                            <img src="{{ asset('img-more/avatar-1.png')}}"
                            class="rounded-circle profile-widget-picture img-thumbnail" loading="lazy">
                            @endif
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Total Buku</div>
                                    <div class="profile-widget-item-value">{{ $total }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <button type="button" class="btn btn-warning" data-toggle="collapse"
                                        data-target="#collapseEditPenulis"><i class="fas fa-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalHapusPenulis"><i class="fas fa-trash"></i>Hapus</a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name" style="margin-top: -15px; margin-bottom:-10px">
                                <span class="font-weight-bold">{{ $item->nama_penulis }}</span> ( {{ $item->profesi }}
                                )
                            </div>
                            <hr>
                            <p style="text-align:justify;margin-top:-5px">{{ $item->tentang ?? 'Tidak ada tentangnya' }}</p>
                        </div>
                        <div class="collapse" id="collapseEditPenulis">
                            <div class="card-header bg-primary text-white font-weight-bold">
                                Edit Penulis : {{ $item->nama_penulis }}
                            </div>
                            <div class="card-body">
                                <form action="{{ route('penulis.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Penulis :</label>
                                            <input type="text" class="form-control" name="nama_penulis"
                                                value="{{ $item->nama_penulis }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Photo :</label>
                                            <input type="file" class="form-control-file" name="photo" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label>Profesi :</label>
                                            <input type="text" class="form-control" name="profesi"
                                                value="{{ $item->profesi }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tentang :</label>
                                            <textarea class="form-control" name="tentang"
                                                value="{{ $item->tentang }}">{{ $item->tentang }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @forelse ($buku as $item)
                    <div class="col-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('buku.show',$item->id) }}">
                                    @if ($item->cover)
                                        <img src="{{ asset('cover/'. $item->cover) }}" class="img-fluid mb-3">
                                    @else
                                        <img src="{{ asset('img-more/img01.jpg') }}" class="img-fluid mb-3">
                                    @endif
                                </a>
                                <h6>{{ $item->judul_buku }}</h6>
                                <a href="{{ route('buku.show', $item->id) }}" class="btn btn-primary btn-block"><i
                                        class="fas fa-eye"></i> Lihat</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 col-md-3">
                        <div class="card mt-2">
                            <div class="card-body">
                                <img src="{{ asset('assets/img/news/img01.jpg') }}" alt="" class="img-fluid mb-3">
                                <a href="{{ route('buku.index') }}" class="btn btn-primary btn-block">Tambah buku</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="modalHapusPenulis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{ route('penulis.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
