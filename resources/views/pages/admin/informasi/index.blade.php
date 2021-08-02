@extends('layouts.admin')
@section('title', 'Papan Informasi')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Papan Informasi</h1>
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
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahInformasi"><i
                        class="far fa-edit"></i> Tambah Informasi</a>
            </div>
        </div>
        <hr>

        <div class="row">
            @forelse ($data as $item)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <iframe class="card-img-top" height="200px" src="https://www.youtube.com/embed/{{ $item->video }}"
                            title="YouTube video player" frameborder="0" allow="autopkay" allowfullscreen></iframe>
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto text-left">
                                    <h6 class="card-title">{{ $item->judul }}</h6>
                                </div>
                                <div class="col-auto text-right">
                                    @if ($item->status == 'Aktif')
                                        <form action="{{ route('informasi.update', $item->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="Belum">
                                            <button type="submit" class="btn btn-success btn-sm">Aktif</button>
                                        </form>
                                    @elseif($item->status == "Belum")
                                    <form action="{{ route('informasi.update', $item->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="Aktif">
                                        <button type="submit" class="btn btn-warning btn-sm">Belum</button>
                                    </form>
                                    @endif
                                    <button type="button" data-toggle="collapse"
                                        data-target="#collapseEditInfo{{ $item->id }}" class="btn btn-info btn-sm"><i
                                            class="fas fa-edit"></i></button>
                                    <form action="{{ route('informasi.destroy', $item->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('informasi.update', $item->id) }}" method="POST" class="collapse mt-2"
                                id="collapseEditInfo{{ $item->id }}">
                                @csrf
                                @method('PATCH')
                                <input type="text" class="form-control mb-1" name="judul" value="{{ $item->judul }}">
                                <input type="text" class="form-control mb-1" name="video" value="{{ $item->video }}">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Belum ada infromasi.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection


@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahInformasi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('informasi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul :</label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukan Judul..." required>
                        </div>
                        <div class="form-group">
                            <label>Kode Video Youtube :</label>
                            <input type="text" class="form-control" name="video" placeholder="Masukan kode embed video..." required>
                        </div>
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control" name="status" required>
                                <option>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Belum">Belum</option>
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
