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
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Agama Islam</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Teknologi</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Masakan</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Pendidikan</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Novel</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Karir</button>
            </div>
        </div>
    </div>
    <hr>
</section>
<section class="katalog my-4">
    <div class="container">
        <div class="row">
            <!-- Product -->
            <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
                <div class="card card-body shadow-sm">
                    <a href="#"><img src="https://library.codalecenter.com/cover/1627041395.jpg"
                            class="img-fluid rounded-double"></a>
                    <h6 class="book-title mt-3 mb-2"><b>76 Dosa Besar Yang Dianggap Biasa</b></h6>
                    <p class="fs-3">Kitab al-Kabair (dosa-dosa besar) karya Imam al-Hafizh Adz-Dzahabi
                        telah
                        diterbitkan oleh berbagai penerbit di tanah air... <a href="#">selengkapnya</a>
                    </p>
                    <button class="btn btn-primary btn-sm rounded-double"><i
                            class="fas fa-check-circle mr-1"></i>
                        Tersedia</button>
                </div>
            </div>
            <!-- End Product -->
            <!-- Product -->
            <div class="col-12 col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-body shadow-sm">
                    <a href="#"><img src="https://library.codalecenter.com/cover/1627041395.jpg"
                            class="img-fluid rounded-double"></a>
                    <h6 class="book-title mt-3 mb-2"><b>76 Dosa Besar Yang Dianggap Biasa</b></h6>
                    <p class="fs-3">Kitab al-Kabair (dosa-dosa besar) karya Imam al-Hafizh Adz-Dzahabi
                        telah
                        diterbitkan oleh berbagai penerbit di tanah air... <a href="#">selengkapnya</a>
                    </p>
                    <button class="btn btn-primary btn-sm rounded-double"><i
                            class="fas fa-check-circle mr-1"></i>
                        Tersedia</button>
                </div>
            </div>
            <!-- End Product -->
            <!-- Product -->
            <div class="col-12 col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-body shadow-sm">
                    <a href="#"><img src="https://library.codalecenter.com/cover/1627041395.jpg"
                            class="img-fluid rounded-double"></a>
                    <h6 class="book-title mt-3 mb-2"><b>76 Dosa Besar Yang Dianggap Biasa</b></h6>
                    <p class="fs-3">Kitab al-Kabair (dosa-dosa besar) karya Imam al-Hafizh Adz-Dzahabi
                        telah
                        diterbitkan oleh berbagai penerbit di tanah air... <a href="#">selengkapnya</a>
                    </p>
                    <button class="btn btn-primary btn-sm rounded-double"><i
                            class="fas fa-check-circle mr-1"></i>
                        Tersedia</button>
                </div>
            </div>
            <!-- End Product -->
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