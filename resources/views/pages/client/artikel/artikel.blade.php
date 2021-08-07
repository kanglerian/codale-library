@extends('layouts.landing')
@section('content')

<section class="katalog" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="row justify-content-between bg-primary mx-1 py-3 rounded-triple brand">
                    <div class="col-12">
                        <div class="input-group mt-1 search">
                            <input type="text" class="form-control rounded-double" placeholder="Cari Artikel" />
                            <div class="input-group-append">
                                <button class="btn btn-light rounded-double" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3 kategori">
                    <div class="col-12 d-none d-md-block mb-2">
                        @foreach ($kategori as $ktg)
                            <button class="btn btn-sm btn-block btn-info rounded-double">
                                {{ $ktg->nama_kategori }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    @foreach ($data as $item)
                    <!-- Product -->
                    <div class="col-12 col-md-6 mb-4" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <div class="text-center">
                                <a href="{{ route('artikel.show',$item->id) }}"><img src="{{ asset('gambar/'.$item->gambar) }}"
                                        class="img-fluid rounded-circle" /></a>
                            </div>
                            <h6 class="book-title mt-4 mb-3">
                                <b>{{ $item->judul_artikel }}</b>
                            </h6>
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <a href="{{ route('artikel.show',$item->id) }}" class="btn btn-primary btn-sm rounded-double px-2">
                                        <i class="fas fa-book-open mr-1"></i> Baca selengkapnya
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <p class="btn btn-primary btn-sm rounded-double fs-3">
                                        <i class="fas fa-hashtag"></i> {{ $item->kategori->nama_kategori }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product -->
                    @endforeach
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