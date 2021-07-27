@extends('layouts.admin')
@section('title', 'Daftar Penerbit')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Daftar Penerbit</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Penerbit</h4>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPenerbit"><i
                        class="far fa-edit"></i> Tambah Penerbit</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Penerbit</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Penerbit</th>
                                        <th>Bidang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $no => $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no + 1 }}
                                            </td>
                                            <td><a href="{{ route('penerbit.show',$item->id) }}"
                                                    style="text-decoration: none">{{ $item->nama_penerbit }}</a></td>
                                            <td>{{ $item->bidang }}</td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}" class="btn btn-warning btn-block btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Penerbit Belum Ada</td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahPenerbit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penerbit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penerbit.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Penerbit :</label>
                        <input type="text" class="form-control" name="nama_penerbit" placeholder="Masukan Penerbit...">
                    </div>
                    <div class="form-group">
                        <label>Bidang :</label>
                        <input type="text" class="form-control" name="bidang" placeholder="Masukan Bidang...">
                    </div>
                    <div class="form-group">
                        <label>Keterangan :</label>
                        <textarea class="form-control" name="keterangan" placeholder="Masukan tentang..."></textarea>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditPenerbit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Penerbit</h5>
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
            url: `penerbit/${id}/edit`,
            method: "GET",
            success: function(data) {
                $('#modalEditPenerbit').find('.modal-isi').html(data);
                $('#modalEditPenerbit').modal('show');
            },
            error: function() {}
        });
    });
</script>
@endpush
