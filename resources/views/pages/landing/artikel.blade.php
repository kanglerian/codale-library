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
                    <div class="col-md-6 d-none d-md-block mb-2">
                        <button class="btn btn-sm btn-block btn-info rounded-double">
                            HTML
                        </button>
                    </div>
                    <div class="col-md-6 d-none d-md-block mb-2">
                        <button class="btn btn-sm btn-block btn-info rounded-double">
                            CSS
                        </button>
                    </div>
                    <div class="col-6 d-none d-md-block mb-2">
                        <button class="btn btn-sm btn-block btn-info rounded-double">
                            JavaScript
                        </button>
                    </div>
                    <div class="col-6 d-none d-md-block mb-2">
                        <button class="btn btn-sm btn-block btn-info rounded-double">
                            PHP
                        </button>
                    </div>
                    <div class="col-6 d-none d-md-block mb-2">
                        <button class="btn btn-sm btn-block btn-info rounded-double">
                            Laravel
                        </button>
                    </div>
                    <div class="col-6 d-none d-md-block mb-2">
                        <button class="btn btn-sm btn-block btn-info rounded-double">
                            Vue JS
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <!-- Product -->
                    <div class="col-12 col-md-6 mb-4" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <div class="text-center">
                                <a href="#"><img
                                        src="https://i.ytimg.com/vi/HqAMb6kqlLs/hqdefault.jpg?sqp=-oaymwEXCOADEI4CSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLB3F_9KTbioOOtwfvi4w3fWZ_qAmw"
                                        class="img-fluid rounded-double" /></a>
                            </div>
                            <h6 class="book-title mt-4 mb-2">
                                <b>Belajar Laravel Dasar</b>
                            </h6>
                            <p class="fs-3">
                                Kelas Laravel di CodaleLibrary akan membahas hal-hal
                                mendasar dari Laravel sampai dengan CRUD...
                                <a href="#">selengkapnya</a>
                            </p>
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <button class="btn btn-primary btn-sm rounded-double px-2">
                                        <i class="fas fa-book-open mr-1"></i> Baca selengkapnya
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <p class="btn btn-primary btn-sm rounded-double fs-3">
                                        <i class="fas fa-eye"></i> 120
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product -->
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