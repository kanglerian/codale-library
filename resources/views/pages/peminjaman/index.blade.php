@extends('layouts.admin')
@section('title', 'Daftar Peminjaman')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Peminjaman</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pinjaman</h4>
                        </div>
                        <div class="card-body">
                            {{ $pinjam }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Buku Sedang Dipinjam</h4>
                        </div>
                        <div class="card-body">
                            {{ $pinjam }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-trash"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Buku Hilang</h4>
                        </div>
                        <div class="card-body">
                            {{ $hilang }}
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPinjam"><i
                        class="far fa-edit"></i> Pinjam Buku</button>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Peminjaman</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>ID Transaksi</th>
                                        <th>Nama Peminjam</th>
                                        <th>Buku</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $no => $item)
                                        <tr>
                                            <td class="text-center">{{ $no + 1 }}</td>
                                            <td>
                                                <a href="{{ route('pinjaman.detail', ['id' => $item->id, 'trid' => $item->id_transaksi]) }}"
                                                    style="text-decoration: none">{{ $item->id_transaksi }}</a>
                                            </td>
                                            <td><a href="{{ route('member.edit',$item->member->id) }}"
                                                    style="text-decoration: none">{{ $item->member->name }}</a>
                                            </td>
                                            <td><a href="{{ route('buku.show', $item->id_buku) }}"
                                                    style="text-decoration: none">{{ $item->buku->judul_buku }}</a></td>
                                            <td>{{ $item->tgl_pinjam }}</td>
                                            <td>
                                                @if ($item->status == 'Pinjam')
                                                    <form action="{{ route('peminjaman.update', $item->id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="id_buku" value="{{ $item->id_buku }}">
                                                        <input type="hidden" name="status" value="Tersedia">
                                                        <input type="hidden" name="tgl_kembali" value="<?php echo date('Y-m-d'); ?>">
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm mb-1">Kembali</button>
                                                    </form>
                                                @elseif($item->status == 'Kembali' or $item->status == 'Hilang' or
                                                    $item->status == 'Tersedia')
                                                    <span class="btn btn-secondary btn-sm mb-1">Selesai</span>
                                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                                                </form>
                                                @endif
                                                @if ($item->status == 'Pinjam')
                                                    <form action="{{ route('peminjaman.update', $item->id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="id_buku" value="{{ $item->id_buku }}">
                                                        <input type="hidden" name="tgl_kembali" value="<?php echo date('Y-m-d'); ?>">
                                                        <input type="hidden" name="status" value="Hilang">
                                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Hilang</button>
                                                    </form>
                                                @endif
                                                @if ($item->status == 'Verifikasi')
                                                    <form action="{{ route('peminjaman.update', $item->id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="id_buku" value="{{ $item->id_buku }}">
                                                        <input type="hidden" name="status" value="Pinjam">
                                                        <button type="submit" class="btn btn-info btn-sm mb-1">Verifikasi</button>
                                                    </form>
                                                    <form action="{{ route('peminjaman.update', $item->id) }}"
                                                        method="POST" style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="id_buku" value="{{ $item->id_buku }}">
                                                        <input type="hidden" name="status" value="Tersedia">
                                                        <input type="hidden" name="tgl_kembali" value="<?php echo date('Y-m-d'); ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Tolak</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Belum ada yang pinjam buku</td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahPinjam">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pinjam Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="collapse" id="collapseTambahPelanggan">
                <div class="card card-body">
                    <form action="{{ route('member.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="no_card"
                                value="<?php echo date('i'); ?><?php echo date('Ym'); ?><?php echo date('his'); ?>">
                            <div class="form-group">
                                <label>Nama Pelanggan :</label>
                                <input type="text" class="form-control" name="nama_member"
                                    placeholder="Masukan Nama Pelanggan...">
                            </div>
                            <input type="hidden" name="kontak" value="">
                            <input type="hidden" name="alamat" value="">
                            <input type="hidden" name="status" value="Aktif">
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="collapse" id="collapseTambahBuku">
                <div class="card card-body">
                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ISBN / Kode Buku :</label>
                                <input type="text" class="form-control" name="isbn" placeholder="Masukan ISBN...">
                            </div>
                            <div class="form-group">
                                <label>Judul Buku :</label>
                                <input type="text" class="form-control" name="judul_buku"
                                    placeholder="Masukan judul buku...">
                            </div>
                            <input type="hidden" name="deskripsi" value="">
                            <input type="hidden" name="harga" value="">
                            <input type="hidden" name="cover" value="">
                            <input type="hidden" name="id_kategori" value="">
                            <input type="hidden" name="id_penulis" value="">
                            <input type="hidden" name="id_penerbit" value="">
                            <input type="hidden" name="status" value="Tersedia">
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary btn-block">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Transaksi :</label>
                        <input type="text" class="form-control" value="TRX<?php echo date('Ymd') . date('his'); ?>" name="id_transaksi"
                            required>
                        <small id="emailHelp" class="form-text text-muted">Note: jika mau transaksi dengan member yang sama, silahkan <span class="font-weight-bold text-warning">copy paste</span> ID Transaksi sebelumnya.</small>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan :</label>
                        <div class="input-group">
                            <select class="form-control" name="id_pelanggan" required @if ($jumlahPelanggan == 0) disabled @endif>
                                <option selected>
                                    @if ($jumlahPelanggan == 0) Member tidak ada yang
                                    aktif @else Pilih @endif
                                </option>
                                @foreach ($pelanggan as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}
                                        {{ $member->id_pengguna }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseTambahPelanggan"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <div class="input-group">
                            <select class="form-control" name="id_buku" required @if ($jumlahBuku == 0) disabled @endif>
                                <option selected >@if ($jumlahBuku == 0) Buku tidak ada @else Pilih @endif</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b->id }}">{{ $b->judul_buku }} {{ $b->isbn }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseTambahBuku"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam :</label>
                        <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali :</label>
                        <input type="date" class="form-control" name="tgl_kembali">
                        <small id="emailHelp" class="form-text text-muted">Note: jika bukan data lama, maka tidak usah diisi.</small>
                    </div>
                    <div class="form-group">
                        <label>Jika mau donasi, boleh :</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button"><i class="fas fa-coins"></i></button>
                            </div>
                            <input type="number" class="form-control" name="donasi" placeholder="Masukan jumlah donasi">
                        </div>
                    </div>
                    <input type="hidden" name="status" value="Pinjam">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" value="Tidak ada keterangan"
                            placeholder="Masukan bila ada keterangan"></textarea>
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

    $(".btn-edit").on('click', function() {
        // alert($(this).data('id'));
        let id = $(this).data('id');
        $.ajax({
            url: `penulis/${id}/edit`,
            method: "GET",
            success: function(data) {
                $('#modalEditPenulis').find('.modal-isi').html(data);
                $('#modalEditPenulis').modal('show');
            },
            error: function() {}
        });
    });
</script>
@endpush
