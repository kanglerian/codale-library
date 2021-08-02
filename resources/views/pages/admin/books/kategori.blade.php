@extends('layouts.admin')
@section('title', 'Kategori Buku')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Kategori Buku</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kategori</h4>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKategori"><i
                        class="far fa-edit"></i> Tambah Kategori</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $no => $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $data->firstItem() + $no }}
                                            </td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    class="btn btn-warning btn-sm btn-edit"><i
                                                        class="fas fa-edit"></i></button>
                                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Kategori belum tersedia, silahkan tambahkan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori :</label>
                        <input type="text" class="form-control" name="nama_kategori"
                            placeholder="Masukan Nama Kategori..." required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan :</label>
                        <textarea type="text" class="form-control" name="keterangan" value="Tidak ada keterangan"
                            placeholder="Masukan keterangan..">Tidak ada keterangan</textarea>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditKategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-isi"></div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    $(".btn-edit").on('click', function() {
        // alert($(this).data('id'));
        let id = $(this).data('id');
        $.ajax({
            url: `kategori/${id}/edit`,
            method: "GET",
            success: function(data) {
                $('#modalEditKategori').find('.modal-isi').html(data);
                $('#modalEditKategori').modal('show');
            },
            error: function() {}
        });
    });
</script>
@endpush
