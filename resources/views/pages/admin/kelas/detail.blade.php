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
                        src="https://www.youtube.com/embed/{{ $item->kode_video }}" allowfullscreen></iframe>
                </div>
                <hr>
                <p>{!! $item->deskripsi !!}</p>
            </div>
            <div class="col-12 col-md-4">
                <ul class="list-group mb-3">
                    <div class="row">
                        <div class="col-7">
                            <li class="list-group-item border-0 fs-4"><button data-toggle="modal" data-target="#modalTambahVideo"
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
                    <li class="list-group-item border-0" id="videoItem"
                        onclick="changeVideo('{{ $item->kode_video }}')"><button
                            class="btn btn-primary btn-block text-left rounded-double fs-3">Introduction</button>
                    </li>
                    @forelse ($detail as $no => $dtl)
                    <li class="list-group-item border-0" id="videoItem" onclick="changeVideo('{{ $dtl->kode_video }}')">
                        <button class="btn btn-primary btn-block text-left rounded-double fs-3">{{ $no + 1 }}.
                            {{ $dtl->judul }}</button>
                    </li>
                    @empty
                    <li class="list-group-item border-0"><button
                            class="btn btn-danger btn-block text-left rounded-double fs-4">Belum ada video</button></li>
                    @endforelse
                </ul>
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
                    <input type="hidden" class="form-control" name="id_kelas" value="{{ $item->id }}">
                    <input type="hidden" class="form-control" name="id_creator" value="{{ Auth::user()->id }}">
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
@push('after-script')
<script>
    function changeVideo(video) {
        var liveVideo = document.getElementById('videoLive');
        liveVideo.src = "https://www.youtube.com/embed/" + video;
    }

</script>
@endpush
