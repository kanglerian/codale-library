@extends('layouts.admin')
@section('title', 'Detail Buku')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $item->judul_buku }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('buku.index') }}">Katalog</a></div>
                <div class="breadcrumb-item active">Detail</div>
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
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($item->cover)
                                <img src="{{ asset('cover/'.$item->cover) }}" loading="lazy" class="img-fluid mb-3">
                            @else
                            <img src="{{ asset('img-more/img01.jpg') }}" loading="lazy" class="img-fluid mb-3"> 
                            @endif
                            
                            <a href="#" class="btn btn-primary btn-block disabled"><i class="fas fa-eye"></i> Lihat (E-Book
                                Tersedia)</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <h2 class="section-title">{{ $item->judul_buku }}</h2>
                    <p class="section-lead">
                        {{ $item->kategori->nama_kategori ?? '' }} | {{ $item->penerbit->nama_penerbit ?? '' }}
                    </p>
                    <p class="text-justify">{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    @if (Auth::user()->pin == 44156)
                    <hr>
                    <h4 class="text-left font-weight-bold"> Rp {{ $item->harga }}</h4>
                    @if ($item->status == 'Kembali')
                        <p class="badge badge-success">Tersedia</p>
                    @elseif($item->status == "Pinjam")
                        <p class="badge badge-warning">Dipinjam</p>
                    @elseif($item->status == "Hilang")
                        <p class="badge badge-danger">Hilang</p>
                    @elseif($item->status == "Tersedia")
                        <p class="badge badge-success">Tersedia</p>
                    @endif
                    <hr>
                    <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#collapseEditBuku"><i
                            class="fas fa-edit"></i> Edit</button>
                    <form action="{{ route('buku.destroy', $item->id) }}" id="delete{{ $item->id }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger swal-delete" data-id="{{ $item->id }}"><i
                                class="fas fa-trash"></i> Hapus</button>
                    </form>
                    @endif
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
                                            <input type="text" class="form-control" name="isbn"
                                                value="{{ $item->isbn }}">
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label>Kategori :</label>
                                            <select class="form-control" name="id_kategori">
                                                <option value="{{ $item->id_kategori ?? '' }}">
                                                    {{ $item->kategori->nama_kategori ?? '' }}</option>
                                                @foreach ($kategori as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama_kategori }}</option>
                                                @endforeach
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
                                            <label>Penulis :</label>
                                            <select class="form-control" name="id_penulis">
                                                <option value="{{ $item->id_penulis ?? '' }}">
                                                    {{ $item->penulis->nama_penulis ?? '' }}</option>
                                                @foreach ($penulis as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama_penulis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label>Penerbit :</label>
                                            <select class="form-control" name="id_penerbit">
                                                <option value="{{ $item->id_penerbit ?? '' }}">
                                                    {{ $item->penerbit->nama_penerbit ?? '' }}</option>
                                                @foreach ($penerbit as $data)
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->nama_penerbit }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                        <textarea class="form-control" name="deskripsi" id="editor"
                                            value="{!!$item->deskripsi!!}">{!!$item->deskripsi!!}</textarea>
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
