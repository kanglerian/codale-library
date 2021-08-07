@extends('layouts.admin')
@section('title', 'Podcast')
@section('background')
<div class="navbar-bg-primary"></div>
@endsection
@push('after-style')
<style>
    .event {
        position: fixed;
        z-index: 1;
        left: 300px;
        bottom: 70px;
        width: 300px;
    }
</style>
@endpush
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Podcast</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPodcast"><i
                    class="fas fa-microphone mr-1"></i> Tambah Podcast</button>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Thumbnail</th>
                                    <th>Judul</th>
                                    <th>Audio</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $no => $item)
                                <tr>
                                    <td class="text-center align-middle">{{ $no + 1 }}</td>
                                    <td><a href="{{ route('audio.show',$item->id) }}" style="text-decoration: none"><img
                                                src="{{ asset('gambar/'.$item->thumbnail) }}" class="rounded"
                                                width="120px" height="68px"></a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('audio.show',$item->id) }}"
                                            style="text-decoration: none"><b>{{ $item->judul }}</b></a><br>
                                        <p>{{ $item->artikel->judul_artikel ?? '' }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <audio controls>
                                            <source src="{{ asset('podcast/'.$item->audio) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <form action="{{ route('audio.destroy',$item->id) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada video</td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahPodcast">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Podcast</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('audio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul :</label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukan judul podcast...">
                    </div>
                    <div class="form-group">
                        <label>Thumbnail :</label>
                        <input type="file" class="form-control-file" name="thumbnail" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Audio :</label>
                        <input type="file" class="form-control-file" name="audio">
                    </div>
                    <div class="form-group">
                        <label>Artikel :</label>
                        <div class="input-group">
                            <select class="form-control" name="id_artikel">
                                <option value="">Pilih</option>
                                @foreach ($artikel as $art)
                                <option value="{{ $art->id }}">{{ $art->judul_artikel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi :</label>
                        <textarea class="form-control" id="editor" name="keterangan" placeholder="Masukan keterangan..."
                            value="{{ old('keterangan') }}">{{ old('keterangan') }}</textarea>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection