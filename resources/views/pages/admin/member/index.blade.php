@extends('layouts.admin')
@section('title', 'Daftar Member')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Daftar Member</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Member</h4>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAnggota"><i
                        class="far fa-edit"></i> Tambah Member</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>ID Pengguna</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kontak dan alamat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $no => $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no + 1 }}
                                            </td>
                                            <td>{{ $item->id_pengguna }}
                                            </td>
                                            <td>
                                                <a href="{{ route('member.edit',$item->id) }}" style="text-decoration: none">{{ $item->name }}</a>
                                            </td>
                                            <td>
                                            <a href="https://api.whatsapp.com/send?phone={{ $item->phone }}"
                                                    target="_blank" class="btn btn-success btn-sm" data-toggle="tooltip"
                                                    data-placement="left" title="{{ $item->phone }}"><i
                                                        class="fab fa-whatsapp"></i> {{ $item->phone }}</a>
                                                <span class="btn btn-info btn-sm" data-toggle="tooltip"
                                                    data-placement="left" title="{{ $item->alamat }}"><i
                                                        class="fas fa-map-marker-alt"></i></span>
                                                <span class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                    data-placement="left" title="{{ $item->password }}"><i
                                                        class="fas fa-key"></i></span>
                                            </td>
                                            <td>
                                                @if ($item->status == 'Aktif')
                                                    <form action="{{ route('member.update', $item->id) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="password" value="{{ $item->password }}">
                                                        <input type="hidden" name="status" value="Verifikasi">
                                                        <button type="submit" class="btn btn-success btn-sm"><i
                                                                class="fas fa-user-check"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('member.update', $item->id) }}" method="POST"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="password" value="{{ $item->password }}">
                                                        <input type="hidden" name="status" value="Aktif">
                                                        <button type="submit" class="btn btn-warning btn-sm"><i
                                                                class="fas fa-user-clock"></i></button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('member.destroy', $item->id) }}"
                                                    id="delete{{ $item->id }}" method="POST" style="display: inline">
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
                                                <td colspan="5" class="text-center">Data Member Belum Ada</td>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahAnggota">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('member.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input id="full_name" type="text" class="form-control" name="name"
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="username" class="form-control" name="username">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <input type="hidden" name="id_pengguna" value="ID<?php echo date('sYi'); ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pin">Masukan PIN</label>
                                <input id="text" type="text" class="form-control" name="pin">
                                <div class="invalid-feedback">
                                </div>
                                <small class="form-text text-muted">Note: Masukan PIN jika ada</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password" class="form-control"
                                        name="password_confirmation">
                                </div>
                                <input type="hidden" name="status" value="Aktif">
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
