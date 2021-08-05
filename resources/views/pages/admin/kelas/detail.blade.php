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
            <div class="breadcrumb-item"><a href="{{ route('class.index') }}">Kelas</a></div>
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
                        src="https://www.youtube.com/embed/renl8dYqTKA" allowfullscreen></iframe>
                </div>
                <hr>
                <p>{!! $item->deskripsi !!}</p>
            </div>
            <div class="col-12 col-md-4">
                <ul class="list-group mb-3">
                    <div class="row">
                        <div class="col-7">
                            <li class="list-group-item border-0 fs-4" id="videoItem"><button
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
                    <li class="list-group-item border-0 fs-4" id="videoItem"><button
                            class="btn btn-primary btn-block text-left rounded-double fs-5">1. Pengenalan Figma</button>
                    </li>
                    <li class="list-group-item border-0 fs-4" id="videoItem"><button
                            class="btn btn-primary btn-block text-left rounded-double fs-5">2. Frame dan Color</button>
                    </li>
                    <li class="list-group-item border-0 fs-4" id="videoItem">
                        <button class="btn btn-primary btn-block text-left rounded-double fs-5">3. Background
                            dan Pen Tools</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <div class="collapse" id="collapseEditBuku">
                    <div class="card-header">
                        Edit Buku : {{ $item->judul_buku }} {{ $item->isbn }}
                    </div>
                    <div class="card card-body">
                        <form action="{{ route('buku.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Judul Buku :</label>
                                    <input type="text" class="form-control" name="judul_buku"
                                        value="{{ $item->judul_buku }}">
                                </div>
                                <div class="form-group">
                                    <label>Cover Buku :</label>
                                    <input type="file" class="form-control-file" name="cover" accept="image/*">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-4">
                                        <label>ISBN / Kode Buku:</label>
                                        <input type="text" class="form-control" name="isbn" value="{{ $item->isbn }}">
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label>Kategori :</label>
                                        <select class="form-control" name="id_kategori">
                                            <option value="{{ $item->id_kategori ?? '' }}">
                                                {{ $item->kategori->nama_kategori ?? '' }}</option>
                                            {{-- @foreach ($kategori as $data)
                                                    <option value="{{ $data->id }}">
                                            {{ $data->nama_kategori }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label>Harga :</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" class="form-control" name="harga"
                                                value="{{ $item->harga }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-4">
                                        <label>Status :</label>
                                        <select class="form-control" name="status">
                                            <option value="{{ $item->status }}">{{ $item->status }}</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Dipinjam">Dipinjam</option>
                                            <option value="Hilang">Hilang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi :</label>
                                    <textarea class="form-control" name="deskripsi"
                                        value="{{ $item->deskripsi }}">{{ $item->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-script')
<script>
    $(".swal-delete").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: "Beneran mau dihapus?",
                    text: "Hapus aja gakpapa kok nanti bikin lagi..",
                    icon: "warning",
                    buttons: ['Batal', 'Oke'],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // swal('Hayooo, atos di delete', {
                        //     icon: "success",
                        // });
                        $(`#delete${id}`).submit();
                    } else {
                        // swal('Aman dong');
                    }
                });
        });
</script>
@endpush