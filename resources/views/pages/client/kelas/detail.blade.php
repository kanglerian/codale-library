@extends('layouts.landing')
@section('content')

<section class="katalog" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                <div class="row">
                    <!-- Product -->
                    <div class="col-12">
                        <div class="card card-body shadow-sm" data-aos="fade-down">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item rounded-triple" id="videoLive"
                                    src="https://www.youtube.com/embed/{{ $item->kode_video }}" allowfullscreen></iframe>
                            </div>
                            <h2 class="mt-4 mb-2">
                                <b>{{ $item->nama_kelas }}</b>
                            </h2>
                            <h6><span class="badge badge-primary"><i class="fas fa-hashtag"></i> {{ $item->kategori->nama_kategori }}</span></h6>
                            <hr>
                            <p class="text-gray fs-2">{!!$item->deskripsi!!}</p>
                        </div>
                        <hr>
                        <small class="text-gray">{{ $item->created_at }}</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card card-body shadow-sm" data-aos="fade-up" data-aos-delay="100">
                    <ul class="list-group">
                        <li class="list-group-item border-0" id="videoItem" onclick="changeVideo('{{ $item->kode_video }}')"><button
                                class="btn btn-primary btn-block text-left rounded-double fs-3">Introduction</button>
                        </li>
                        @forelse ($detail as $no => $dtl)
                            <li class="list-group-item border-0" id="videoItem" onclick="changeVideo('{{ $dtl->kode_video }}')"><button
                                    class="btn btn-primary btn-block text-left rounded-double fs-3">{{ $no + 1 }}. {{ $dtl->judul }}</button>
                            </li>
                        @empty
                        <li class="list-group-item border-0"><button
                            class="btn btn-danger btn-block text-left rounded-double fs-4">Belum ada video</button></li>
                        @endforelse
                    </ul>
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
<script>
    function changeVideo(video) {
        var liveVideo = document.getElementById('videoLive');
        liveVideo.src = "https://www.youtube.com/embed/" + video;
    }

</script>
@endpush