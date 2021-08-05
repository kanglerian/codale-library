@extends('layouts.landing')
@section('content')
<!-- Menu Kelas -->
<section class="cari mb-3 px-3" style="margin-top: 100px">
    <div class="container">
        <div class="row justify-content-between bg-primary py-3 px-2 rounded-triple">
            <div class="col-12 col-md-4 brand">
                <h5 class="my-2 text-white"><i class="fas fa-chalkboard mr-1"></i> <b>Kelas Online</b></h5>
            </div>
            <div class="col-12 col-md-4">
                <div class="input-group mt-1 search">
                    <input type="text" class="form-control rounded-double" placeholder="Cari Kelas Online">
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
                <button class="btn btn-sm btn-block btn-info rounded-double">HTML</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">CSS</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">JavaScript</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">PHP</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Laravel</button>
            </div>
            <div class="col-6 col-md-2 mb-2 d-none d-md-block">
                <button class="btn btn-sm btn-block btn-info rounded-double">Vue JS</button>
            </div>
        </div>
    </div>
    <hr>
</section>
<section class="katalog my-4">
    <div class="container">
        <div class="row">
            <!-- Product -->
            @foreach ($data as $item)
            <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
                <div class="card card-body shadow-sm">
                    <a href="{{ route('kelas.show',$item->id) }}"><img src="{{ asset('gambar/'.$item->gambar) }}"
                            class="img-fluid rounded-double"></a>
                    <h6 class="book-title mt-3"><b>{{ $item->nama_kelas }}</b></h6>
                    <p class="fs-3"><span class="badge badge-success">{{ $item->tipe }}</span></p>
                    <hr style="margin-top: 0px">
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{ asset('photo/' . $item->pelanggan->photo) }}" class="rounded-circle" height="40px">
                        </div>
                        <div class="col-auto mt-1" style="margin-left:-20px;">
                            <a class="font-weight-bold fs-3">{{ $item->pelanggan->name }}</a><br>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('kelas.show',$item->id) }}" class="btn btn-primary btn-sm rounded-double"><i class="fas fa-laptop-code mr-1"></i>
                        Ikuti Kelas</a>
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