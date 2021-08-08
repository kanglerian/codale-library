@extends('layouts.landing')
@section('content')
<section class="banner mb-2" style="margin-top:90px;overflow: hidden;">
    <div class="container">
        <div class="row justify-content-center img-banner">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @foreach ($banner as $konten)
                    <div class="item">
                        <a href="#" target="_blank"><img src="{{ asset('gambar/' . $konten->gambar) ?? '' }}" class="img-fluid rounded-triple" loading="lazy" /></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="katalog">
    <div class="container">
        <div class="row justify-content-center mx-1 px-2">
            <div class="col-12 col-md-5 p-1 align-self-center mb-2 shalat d-none d-md-block">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body rounded-triple shadow-sm">
                            <h6 class="text-center mt-3" id="hari"><b><i class="far fa-calendar-alt mr-2"></i> Jadwal
                                    Shalat
                                    Kota Tasikmalaya</b></h6>
                            <h2 id="coba"></h2>
                            <div class="table-responsive">
                                <table class="table text-center fs-3">
                                    <tr>
                                        <th>Shubuh</th>
                                        <th>Dzuhur</th>
                                        <th>Ashar</th>
                                        <th>Maghrib</th>
                                        <th>Isya</th>
                                    </tr>
                                    <tr>
                                        <td><span class="badge badge-primary" id="shubuh">04:57</span></td>
                                        <td><span class="badge badge-primary" id="dzuhur">04:57</span></td>
                                        <td><span class="badge badge-primary" id="ashar">04:57</span></td>
                                        <td><span class="badge badge-primary" id="maghrib">04:57</span></td>
                                        <td><span class="badge badge-primary" id="isya">04:57</span></td>

                                    </tr>
                                    <tr>
                                        <td colspan="5"><button class="btn btn-primary rounded-double btn-block btn-sm fs-3" id="liveTime">12:52
                                                WIB</button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 align-self-center mb-2 kajian d-none d-md-block">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item rounded-triple" id="videoLive" src="https://www.youtube.com/embed/renl8dYqTKA" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-2 align-self-center mb-2 channel d-none d-md-block">
                <div class="card-body rounded-double shadow-sm">
                    <ul class="list-group">
                        {{-- <i class="fas fa-dot-circle text-danger mr-1"></i> --}}
                        @foreach ($info as $tv)
                        <li class="list-group-item border-0 fs-4" id="videoItem" onclick="changeVideo('{{ $tv->video }}')"><button class="btn btn-primary btn-sm btn-block rounded-double fs-5">{{ $tv->judul }}</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Menu Buku -->

<section class="katalog" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="kelas.html">
                    <div class="
                                                                          row
                                                                          justify-content-between
                                                                          bg-primary
                                                                          mx-1
                                                                          my-4
                                                                          py-1
                                                                          px-2
                                                                          rounded-triple
                                                                        ">
                        <div class="col-12">
                            <h6 class="my-2 text-white">
                                <i class="fas fa-pen-nib mr-1"></i> <b>Artikel</b>
                            </h6>
                        </div>
                    </div>
                </a>
                <div class="row">
                    @foreach ($artikel as $art)
                    <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <div class="text-center">
                                <a href="{{ route('artikel.show',$art->id) }}"><img src="{{ asset('gambar/'.$art->gambar) }}" loading="lazy" class="img-fluid"/></a>
                            </div>
                            <h6 class="book-title mt-4 mb-4">
                                <b>{{ $art->judul_artikel }}</b>
                            </h6>
                            <div class="row justify-content-between">
                                <div class="col-12">
                                    <a href="{{ route('artikel.show',$art->id) }}" class="btn btn-primary btn-sm rounded-double px-2">
                                        <i class="fas fa-book-open mr-1"></i> Baca selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 text-center fs-3">
                        <a href="{{ route('artikel.index') }}">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr />

<section class="katalog my-3" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('katalog.index') }}">
                    <div class="
                                                                          row
                                                                          justify-content-between
                                                                          bg-primary
                                                                          mx-1
                                                                          my-4
                                                                          py-1
                                                                          px-2
                                                                          rounded-triple
                                                                        ">
                        <div class="col-12">
                            <h6 class="my-2 text-white">
                                <i class="fas fa-book mr-1"></i> <b>Buku Terbaru</b>
                            </h6>
                        </div>
                    </div>
                </a>
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <a href="#"><img src="{{ asset('cover/' . $item->cover) ?? '' }}" class="img-fluid rounded-double" loading="lazy" /></a>
                            <a href="#" class="text-dark">
                                <h6 class="book-title mt-3 mb-2">
                                    <b>{{ $item->judul_buku }}</b>
                                </h6>
                            </a>
                            <p class="fs-3">
                                {{ $item->deskripsi ?? 'Tidak ada keterangan' }}
                            </p>
                            <a href="#" class="btn btn-primary btn-sm rounded-double">
                                <i class="fas fa-check-circle mr-1"></i> Tersedia
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 text-center fs-3">
                        <a href="{{ route('katalog.index') }}">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr />

<section class="katalog my-3" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="kelas.html">
                    <div class="
                                                                          row
                                                                          justify-content-between
                                                                          bg-primary
                                                                          mx-1
                                                                          my-4
                                                                          py-1
                                                                          px-2
                                                                          rounded-triple
                                                                        ">
                        <div class="col-12">
                            <h6 class="my-2 text-white">
                                <i class="fas fa-chalkboard mr-1"></i> <b>Kelas Online</b>
                            </h6>
                        </div>
                    </div>
                </a>
                <div class="row">
                    @forelse($kelas as $kls)
                    <div class="col-12 col-md-4 mb-4" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <a href="#"><img src="{{ asset('gambar/'.$kls->gambar) }}" loading="lazy" class="img-fluid rounded-double" /></a>
                            <h6 class="book-title mt-3 mb-2">
                                <b>{{ $kls->nama_kelas }}</b>
                            </h6>
                            <p class="fs-3">
                                Kelas Laravel di CodaleLibrary akan membahas hal-hal
                                mendasar dari Laravel sampai dengan CRUD...
                                <a href="#">selengkapnya</a>
                            </p>
                            <button class="btn btn-primary btn-sm rounded-double">
                                <i class="fas fa-laptop-code mr-1"></i> Ikuti Kelas
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="col-12mb-4" data-aos="fade-up">
                        <div class="card card-body shadow-sm">
                            <p>Kelas belum ada</p>
                        </div>
                    </div>
                    @endforelse
                    <div class="col-12 text-center fs-3">
                        <a href="{{ route('kelas.index') }}">Lihat selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Menu Kelas -->

@endsection
@push('after-script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function changeVideo(video) {
        var liveVideo = document.getElementById('videoLive');
        liveVideo.src = "https://www.youtube.com/embed/" + video;
    }

</script>
<script>
    var tanggal = new Date();
    var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober"
        , "November", "Desember"
    ];
    document.getElementById("hari").innerHTML =
        `<b>${hari[tanggal.getDay()]}, ${[tanggal.getDate()]} ${bulan[tanggal.getMonth()]} ${[tanggal.getFullYear()]}</b>`;

    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("liveTime").innerText = time;
        document.getElementById("liveTime").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();

</script>
<script>
    function showJadwal() {
        var tanggal = new Date();
        var date = ["00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15"
            , "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"
        ];
        var month = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
        $.ajax({
            url: `https://api.myquran.com/v1/sholat/jadwal/1227/` + `${tanggal.getFullYear()}` + `/` +
                `${month[tanggal.getMonth()]}` + `/` + `${date[tanggal.getDate()]}`
            , type: 'get'
            , dataType: 'json'
            , success: function(result) {
                // console.log(result);
                var jadwal = result.data.jadwal;
                console.log(jadwal);
                document.getElementById('shubuh').innerHTML = jadwal.subuh;
                document.getElementById('dzuhur').innerHTML = jadwal.dzuhur;
                document.getElementById('ashar').innerHTML = jadwal.ashar;
                document.getElementById('maghrib').innerHTML = jadwal.maghrib;
                document.getElementById('isya').innerHTML = jadwal.isya;
            }
        });
    }

    showJadwal();

</script>
@endpush
