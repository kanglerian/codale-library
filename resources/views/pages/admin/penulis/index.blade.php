@extends('layouts.admin')
@section('title', 'Daftar Penulis')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Penulis</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Penulis</h4>
                        </div>
                        <div class="card-body">
                            {{ $total }}
                        </div>
                    </div>
                </div>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPenulis"><i
                        class="far fa-edit"></i> Tambah Penulis</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Penulis</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama Penulis</th>
                                        <th>Profesi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $no => $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no + 1 }}
                                            </td>
                                            <td><a href="{{ route('penulis.show', $item->id) }}"
                                                    style="text-decoration: none">{{ $item->nama_penulis }}</a></td>
                                            <td>{{ $item->profesi }}</td>
                                            <td>
                                                <form action="{{ route('penulis.destroy',$item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-edit"><i
                                                        class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Penulis Belum Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahPenulis">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penulis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Penulis :</label>
                        <input type="text" class="form-control" name="nama_penulis"
                            placeholder="Masukan Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Photo :</label>
                        <input type="file" class="form-control-file" name="photo" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Profesi :</label>
                        <input type="text" class="form-control" name="profesi" placeholder="Masukan Profesi...">
                    </div>
                    <div class="form-group">
                        <label>Tentang :</label>
                        <textarea class="form-control" name="tentang" placeholder="Masukan tentang..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
