@extends('layouts.landing')
@section('content')

<section class="katalog" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-body shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    @if ($item->cover)
                    <img src="{{ asset('cover/'.$item->cover) }}" class="img-fluid rounded-triple">
                    @else
                    <img src="{{ asset('img-more/img01.jpg') }}" class="img-fluid rounded-triple">
                    @endif
                    <div class="bg-gray fs-4 my-3 py-3 rounded-double">
                        <div class="col-12 mb-2">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    Kategori :
                                </div>
                                <div class="col-8 text-right">
                                    {{ $item->kategori->nama_kategori }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    Penerbit :
                                </div>
                                <div class="col-8 text-right">
                                    {{ $item->penerbit->nama_penerbit }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if ($item->status == 'Kembali')
                            <a href="{{ route('buku.index') }}" class="btn btn-success btn-block btn-sm"><i class="fas fa-plus mr-1"></i> Pinjam buku</a>
                            @elseif($item->status == "Pinjam")
                            <button class="btn btn-success btn-block btn-sm"><i class="fas fa-user mr-1"></i> Dipinjam</button>
                            @elseif($item->status == "Hilang")
                            <button class="btn btn-success btn-block btn-sm"><i class="fas fa-times-circle mr-1"></i> Hilang</button>
                            @elseif($item->status == "Tersedia")
                            <a href="{{ route('buku.index') }}" class="btn btn-success btn-block btn-sm"><i class="fas fa-plus mr-1"></i> Pinjam buku</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 mb-4">
                <div class="row">
                    <!-- Product -->
                    <div class="col-12">
                        <div class="card card-body shadow-sm" data-aos="fade-down">
                            <h2 class="mt-4 mb-2">
                                <b>{{ $item->judul_buku }}</b>
                            </h2>
                            <p class="fs-3">Penulis : <span
                                    class="badge badge-primary">{{ $item->penulis->nama_penulis }}</span></p>
                            <hr>
                            <p class="text-gray fs-2">{!!$item->deskripsi!!}</p>
                        </div>
                        <hr>
                        <small class="text-gray">{{ $item->created_at }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Menu Kelas -->
@endsection

@push('after-script')
<script>
    gsap.from('.brand',{duration:0.5,opacity:0,scale:0});
        gsap.from('.search',{duration:0.5,delay:0.5,scale:0});
        gsap.from('.kategori',{duration:0.5,delay:0.5,opacity:0,y:100});
</script>
@endpush