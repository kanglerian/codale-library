@extends('layouts.admin')
@section('title', 'Daftar Donasi')
@section('background')
    <div class="navbar-bg-success"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Daftar Donasi</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Donasi Diterima</h4>
                        </div>
                        <div class="card-body">
                            Rp100.000
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-success">Daftar Donasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Tanggal</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $no => $item)
                                        <tr>
                                            <td class="text-center">{{ $no + 1 }}</td>
                                            <td>{{ $item->tgl_pinjam }}</td>
                                            <td>{{ $item->member->nama_member }}</td>
                                            <td>Rp{{ $item->donasi }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada yang berdonasi</td>
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

@push('after-script')
<script>
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
