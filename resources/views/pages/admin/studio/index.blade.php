@extends('layouts.admin')
@section('title', 'Studio')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection

@push('after-style')
@endpush
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Studio</h1>
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
        <div class="row">
            @forelse ($data as $item)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('buku.show', $item->id) }}"><img
                                    src="{{ asset('cover/' . $item->cover) ?? '' }}" loading="lazy"
                                    class="img-fluid mb-3"></a>
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
                    <p class="text-center">Belum ada video.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection