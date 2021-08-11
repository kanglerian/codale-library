@extends('layouts.landing')
@section('content')
<!-- Menu Kelas -->
<section class="cari mb-3 px-3" style="margin-top: 100px">
    <div class="container">
        <div class="row justify-content-between bg-primary py-3 px-2 rounded-triple">
            <div class="col-12 col-md-4 brand">
                <h5 class="my-2 text-white"><i class="fas fa-shopping-bag mr-1"></i> <b>Katalog Buku</b></h5>
            </div>
            <div class="col-12 col-md-4">
                <div class="input-group mt-1 search">
                    <input type="text" class="form-control rounded-double" placeholder="Cari Buku">
                    <div class="input-group-append">
                        <button class="btn btn-light rounded-double" type="button"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="kategori mt-3 px-3">
    <div class="container">
        <div class="row justify-content-center kategori">
            @foreach ($kategori as $ktg)
                <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                    <button class="btn btn-sm btn-block btn-info rounded-double">{{ $ktg->nama_kategori }}</button>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
</section>
<section class="katalog my-4">
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
            <!-- Product -->
            <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
                <div class="card card-body shadow-sm">
                    <a href="#">
                        @if ($item->cover)
                            <img src="{{ asset('cover/' . $item->cover)}}"
                        class="img-fluid rounded-double">
                        @else
                            <img src="{{ asset('img-more/img01.jpg')}}"
                        class="img-fluid rounded-double">
                        @endif
                    </a>
                    <h6 class="book-title mt-3 mb-2"><b>{{ $item->judul_buku }}</b></h6>
                    <p class="fs-3 book-desc">{{ $item->deskripsi ?? 'Tidak ada keterangan' }}</p>
                    @if ($item->status == 'Pinjam')
                        <button class="btn btn-success btn-sm rounded-double"><i
                            class="fas fa-check-circle mr-1"></i>
                    @else
                        <button class="btn btn-primary btn-sm rounded-double"><i
                            class="fas fa-check-circle mr-1"></i>
                    @endif
                        {{ $item->status }}</button>
                </div>
            </div>
            <!-- End Product -->
            @endforeach
        </div>
    </div>
</section>
<!-- End Menu Kelas -->

@endsection

@push('after-script')
    <script>
        gsap.from('.brand',{duration:0.5,opacity:0,x:100});
        gsap.from('.search',{duration:0.5,delay:0.5,scale:0});
        gsap.from('.kategori',{duration:0.5,delay:0.5,opacity:0,y:100});
    </script>
@endpush