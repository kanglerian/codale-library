@extends('layouts.admin')
@section('title', 'Studio')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection

@push('after-style')
<style>
    .content-ellipsis {
        white-space: nowrap;
        width: 300px !important;
        overflow: hidden;
        text-overflow: ellipsis !important;
    }
</style>
@endpush
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Codale Creator Studio</h1>
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
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahVideo"><i class="fas fa-upload mr-1"></i> Unggah video</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped dataTable" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Video</th>
                                    <th>Judul</th>
                                    <th>Kelas</th>
                                    <th>Creator</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $no => $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $no + 1 }}
                                    </td>
                                    <td><a href="{{ route('buku.show', $item->id) }}" style="text-decoration: none">
                                            <img src="https://i.ytimg.com/vi/TYpDCdEjx8Y/maxresdefault.jpg"
                                                class="rounded" width="120px" height="68px">
                                        </a></td>
                                    <td><p class="content-ellipsis"><b>{{ $item->judul}}</b></p>
                                        <p class="content-ellipsis" style="margin-top: -20px">{{ $item->keterangan}}</p>
                                    </td>
                                    <td>{{ $item->kelas->nama_kelas }}</td>
                                    <td>{{ $item->creator->name }}</td>
                                    <td>
                                        @if ($item->status == 'Aktif')
                                        <div class="badge badge-success">Aktif</div>
                                        @elseif($item->status == "Tidak Aktif")
                                        <div class="badge badge-danger">Tidak Aktif</div>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Video belum ada</td>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahVideo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('detailkelas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul :</label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukan Judul..." required>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail :</label>
                            <input type="file" class="form-control-file" name="thumbnail" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Video :</label>
                            <input type="text" class="form-control" name="kode_video" placeholder="Masukan Kode Video...">
                            <small class="form-text text-muted">Contoh: youtube.com/watch?v=<b>HA6H8gSoq00</b></small>
                        </div>
                        <div class="form-group">
                            <label>Kelas :</label>
                            <select class="form-control" name="id_kelas" required>
                                <option>Pilih</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Creator :</label>
                            <select class="form-control" name="id_creator" required>
                                <option>Pilih</option>
                                @foreach ($creator as $crt)
                                <option value="{{ $crt->id }}">{{ $crt->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan :</label>
                            <textarea class="form-control" name="keterangan" placeholder="Masukan keterangan..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control" name="status" required>
                                <option>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
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