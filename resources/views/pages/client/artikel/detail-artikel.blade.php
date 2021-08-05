@extends('layouts.landing')
@section('content')

<section class="katalog" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mb-5">
                <div class="row">
                    <!-- Product -->
                    <div class="col-12" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <div class="text-center">
                                <a href="#"><img src="{{ asset('gambar/'.$item->gambar) }}"
                                        class="img-fluid rounded-double" /></a>
                            </div>
                            <h2 class="mt-4 mb-3">
                                <b>{{ $item->judul_artikel }}</b>
                            </h2>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="badge badge-primary"><i class="fas fa-hashtag"></i>
                                        {{ $item->kategori->nama_kategori }}</h6>
                                </div>
                            </div>
                            <hr>
                            <p>{!!$item->isi!!}</p>
                            <hr>
                            <small class="text-gray">{{ $item->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12 mb-3" data-aos="fade-up">
                        <div class="card card-body owl-carousel owl-theme shadow-sm">
                            <div class="item">
                                <img src="{{ asset('img-more/cek.jpeg') }}" class="img-fluid">
                            </div>
                            <div class="item">
                                <img src="{{ asset('img-more/cek.jpeg') }}" class="img-fluid">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h6 class="fs-3 mb-3"><i class="far fa-dot-circle"></i> <b>Pengagungan Terhadap Ilmu 01</b></h6>
                        <audio controls>
                            <source src="{{ asset('audio/pengterilsatu.mpeg') }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <hr>
                    </div>
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h6 class="fs-3 mb-3"><i class="far fa-dot-circle"></i> <b>Pengagungan Terhadap Ilmu 02</b></h6>
                        <audio controls>
                            <source src="{{ asset('audio/pengterilsatu.mpeg') }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <hr>
                    </div>
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h6 class="fs-3 mb-3"><i class="far fa-dot-circle"></i> <b>Pengagungan Terhadap Ilmu 03</b></h6>
                        <audio controls>
                            <source src="{{ asset('audio/pengterilsatu.mpeg') }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <hr>
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