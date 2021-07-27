@extends('layouts.admin')
@section('title', 'Daftar Pinjamanku')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Daftar Pinjamanku</h1>
        </div>
        <div class="row">
            @forelse ($data as $item)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('buku.show',$item->buku->id) }}"><img src="{{ asset('cover/'.$item->buku->cover) ?? '' }}"
                                loading="lazy" class="img-fluid mb-3"></a>
                            <h6 class="card-title">{{ $item->buku->judul_buku }}</h6>
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <p>Tanggal Pinjam</p>
                                    <p>Tanggal Kembali</p>
                                </div>
                                <div class="col-auto text-right">
                                    <p>{{ $item->tgl_pinjam }}</p>
                                    @if ($item->tgl_kembali == null)
                                        <p class="badge badge-warning">Masih pinjam</p>
                                    @elseif($item->status == 'Hilang')
                                        <p class="badge badge-danger">{{ $item->tgl_kembali }}</p>
                                    @else
                                        <p class="badge badge-success">{{ $item->tgl_kembali }}</p>
                                    @endif
                                </div>
                            </div>
                            @if ($item->status == 'Pinjam')
                                <span class="btn btn-success btn-block"><i class="fas fa-eye"></i> Lihat</span>
                            @elseif($item->status == 'Hilang')
                                <span class="btn btn-danger btn-block disabled"><i class="fas fa-times"></i> Hilang</span>
                                @elseif($item->status == 'Verifikasi')
                                    <span class="btn btn-info btn-block disabled"><i class="fas fa-shopping-cart"></i> Menunggu Persetujuan</span>
                            @else
                                <span class="btn btn-secondary btn-block disabled"><i class="fas fa-undo-alt"></i> Dikembalikan</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum pinjam buku, <a href="{{ route('buku.index') }}" class="btn btn-primary btn-sm">klik disini</a> untuk pinjam buku</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditBuku">
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
</div>
@endsection
