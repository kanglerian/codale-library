@extends('layouts.admin')
@section('title', 'Koleksi Buku')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection

@push('after-style')

<style>
    .book-writter,.book-publisher{
        white-space: nowrap; 
        width: 180px; 
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

@endpush
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Koleksi Buku</h1>
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
        <div class="row justify-content-between mb-4">
            <div class="col-12 text-left">
                @if (Auth::user()->pin === '44156')
                    <a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Tambah
                        Data</a>
                    <button type="button" class="btn btn-primary ml-2" data-toggle="collapse" data-target="#collapseTable"
                        aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-caret-square-down"></i> Tabel
                        Buku</button>
                @endif
            </div>
        </div>
        @if (Auth::user()->pin === '44156')
            <div class="collapse" id="collapseTable">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Buku</h4>
                                </div>
                                <div class="card-body">
                                    {{ $total }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pinjam</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalPinjam }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-coins"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Donasi</h4>
                                </div>
                                <div class="card-body">
                                    Rp0,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="far fa-edit"></i> Tambah
                            Data</a>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Buku</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped dataTable" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Judul Buku</th>
                                                <th>Kategori</th>
                                                <th>Penulis</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $no => $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $no + 1 }}
                                                    </td>
                                                    <td><a href="{{ route('buku.show', $item->id) }}"
                                                            style="text-decoration: none">{{ $item->judul_buku }}</a></td>
                                                    <td>{{ $item->kategori->nama_kategori ?? '' }}</td>
                                                    <td><a href="{{ route('penulis.show', $item->id_penulis ?? '') }}"
                                                            style="text-decoration: none">{{ $item->penulis->nama_penulis ?? '' }}</a>
                                                    </td>

                                                    <td>
                                                        @if ($item->status == 'Kembali')
                                                            <div class="badge badge-success">Tersedia</div>
                                                        @elseif($item->status == "Pinjam")
                                                            <div class="badge badge-warning">Dipinjam</div>
                                                        @elseif($item->status == "Hilang")
                                                            <div class="badge badge-danger">Hilang</div>
                                                        @elseif($item->status == "Tersedia")
                                                            <div class="badge badge-success">Tersedia</div>
                                                        @elseif($item->status == "Verifikasi")
                                                            <div class="badge badge-info">Butuh Verifikasi</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Buku belum ada</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            @forelse ($data as $item)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('buku.show', $item->id) }}">
                                @if ($item->cover)
                                <img src="{{ asset('cover/' . $item->cover)}}" loading="lazy"
                                    class="img-fluid mb-3">
                                @else
                                    <img src="{{ asset('img-more/img01.jpg')}}" loading="lazy"
                                class="img-fluid mb-3">
                                @endif
                            </a>
                            <h6 class="card-title">{{ $item->judul_buku }}</h6>
                            <div class="row justify-content-between">
                                <div class="col-auto align-items-start">
                                    <p>Penulis</p>
                                    <p>Penerbit</p>
                                    <p>Status</p>
                                </div>
                                <div class="col-auto text-right align-items-end">
                                    <p class="book-writter">{{ $item->penulis->nama_penulis ?? 'Belum diisi' }}</p>
                                    <p class="book-publisher">{{ $item->penerbit->nama_penerbit ?? 'Belum diisi' }}</p>
                                    <p>
                                        @if ($item->status == 'Kembali')
                                            <span class="badge badge-success">Tersedia</span>
                                        @elseif($item->status == "Pinjam")
                                            <span class="badge badge-warning">Dipinjam</span>
                                        @elseif($item->status == "Hilang")
                                            <span class="badge badge-danger">Hilang</span>
                                        @elseif($item->status == "Tersedia")
                                            <span class="badge badge-success">Tersedia</span>
                                        @elseif($item->status == "Verifikasi")
                                            <span class="badge badge-info">Menunggu Persetujuan</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @if (Auth::user()->pin === '44156')
                                <a href="{{ route('buku.show', $item->id) }}" class="btn btn-primary btn-block"><i
                                        class="fas fa-eye"></i> Lihat</a>
                            @endif
                            @if (Auth::user()->pin !== '44156')
                                @if ($item->status == 'Kembali')
                                    <form action="{{ route('pinjambuku') }}" method="POST" style="display: inline">
                                        @csrf
                                        <input type="hidden" class="form-control" value="TRX<?php echo date('Ymd') . date('his'); ?>"
                                            name="id_transaksi">
                                        <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->id }}">
                                        <input type="text" name="id_buku" value="{{ $item->id_buku }}">
                                        <input type="hidden" name="tgl_pinjam" value="<?php echo date('Y-m-d'); ?>">
                                        <input type="hidden" name="status" value="Verifikasi">
                                        <input type="hidden" name="donasi" value="0">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i>
                                            Pinjam buku</button>
                                    </form>
                                @elseif($item->status == "Tersedia")
                                    <form action="{{ route('pinjambuku') }}" method="POST" style="display: inline">
                                        @csrf
                                        <input type="hidden" class="form-control" value="TRX<?php echo date('Ymd') . date('his'); ?>"
                                            name="id_transaksi">
                                        <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="id_buku" value="{{ $item->id }}">
                                        <input type="hidden" name="tgl_pinjam" value="<?php echo date('Y-m-d'); ?>">
                                        <input type="hidden" name="status" value="Verifikasi">
                                        <input type="hidden" name="donasi" value="0">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i>
                                            Pinjam buku</button>
                                    </form>
                                @elseif($item->status == "Hilang")
                                    <span class="btn btn-danger btn-block disabled">Hilang</span>
                                @elseif($item->status == "Pinjam")
                                    <span class="btn btn-warning btn-block disabled">Dipinjam</span>
                                @elseif($item->status == "Verifikasi")
                                    <span class="btn btn-warning btn-block disabled">Sedang dipesan</span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada buku.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection

@section('modal')
    {{-- <div class="modal fade" tabindex="-1" role="dialog" id="modalEditBuku">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ISBN / Kode Buku:</label>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Judul Buku :</label>
                        <input type="text" class="form-control" value="Aplikasi Arduino & Sensor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <img src="https://cdn.gramedia.com/uploads/items/Aplikasi_Arduino_Dan_Sensor.jpg"
                                class="img-fluid">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cover Buku :</label>
                            <input type="file" class="form-control-file"
                                value="https://cdn.gramedia.com/uploads/items/Aplikasi_Arduino_Dan_Sensor.jpg">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kategori :</label>
                            <select class="form-control">
                                <option selected>Internet of Things</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Harga :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" value="104.000,00">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi :</label>
                        <textarea class="form-control"
                            value="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur consectetur, voluptatibus, labore tempore vero rem veniam soluta incidunt sed voluptas officia possimus id facere laudantium minima quaerat quam, sequi molestias amet expedita provident eum tenetur! Dolor expedita delectus blanditiis, sit odit rerum</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Penulis :</label>
                            <select class="form-control">
                                <option selected>Lerian Febriana, A.Md.Kom</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Penerbit :</label>
                            <select class="form-control">
                                <option selected>Gramedia Press</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status :</label>
                        <select class="form-control">
                            <option selected>Tersedia</option>
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
</div> --}}
@endsection
