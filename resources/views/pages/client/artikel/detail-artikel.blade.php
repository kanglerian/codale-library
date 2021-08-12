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
                                <a href="#">
                                    @if ($item->gambar)
                                        <img src="{{ asset('gambar/'.$item->gambar) }}"
                                        class="img-fluid rounded-double" />
                                    @else
                                        <img src="{{ asset('img-more/img01.jpg') }}"
                                    class="img-fluid rounded-double" />  
                                    @endif
                                </a>
                            </div>
                            <h2 class="mt-4 mb-3">
                                <b>{{ $item->judul_artikel }}</b>
                            </h2>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="badge badge-primary"><i class="fas fa-hashtag"></i>
                                        {{ $item->kategori->nama_kategori ?? '' }}</h6>
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
                    @foreach ($podcast as $pdc)
                    <div class="col-12 text-left" data-aos="fade-up">
                        <h6 class="fs-4 mb-3"><i class="far fa-dot-circle mr-1"></i><b>{{ $pdc->judul }}</b></h6>
                        <audio controls>
                            <source src="{{ asset('podcast/'.$pdc->audio) }}" type="audio/mpeg">
                        </audio>
                        <hr>
                    </div>
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