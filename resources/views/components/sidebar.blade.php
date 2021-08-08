<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard.index') }}">Codale Library</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="@if (Request::segment(1)=='beranda' ) active @endif"><a class="nav-link"
                    href="{{ route('beranda.index') }}"><i class="fas fa-home"></i>
                    <span>Beranda</span></a></li>
            @if (Auth::user()->pin !== '44156')
            <li class="menu-header">Dashboard</li>
            @endif
            @if (Auth::user()->pin !== '44156')
            <li class="@if (Request::segment(1)=='akun' ) active @endif"><a class="nav-link" target="_blank"
                    href="{{ route('akun.index') }}"><i class="fas fa-history"></i>
                    <span>Daftar Pinjamanku</span></a></li>
            @endif
            @if (Auth::user()->pin === '44156')
            <li class="menu-header">
                Transaksi
            </li>
            <li class="@if (Request::segment(1)=='dashboard' ) active @endif"><a class="nav-link"
                    href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a></li>
            <li class="nav-item dropdown @if (Request::segment(2)=='peminjaman' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-receipt"></i>
                    <span>Peminjaman Buku</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(2)=='peminjaman' ) active @endif"><a class="nav-link"
                            href="{{ route('peminjaman.index') }}">Pinjam &
                            Kembali</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown @if (Request::segment(2)=='baca' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i>
                    <span>Pojok Baca</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(2)=='baca' ) active @endif"><a class="nav-link"
                            href="{{ route('baca.index') }}">Membaca Buku</a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->pin === '44156')
            <li class="menu-header">Master Data</li>
            <li class="nav-item dropdown @if (Request::segment(1)=='member' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Member</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(1)=='member' ) active @endif"><a class="nav-link"
                            href="{{ route('member.index') }}">Daftar
                            Anggota</a></li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->pin === '44156')
            <li class="nav-item dropdown @if (Request::segment(1)=='buku' or
                Request::segment(1)=='kategori' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i>
                    <span>Koleksi Buku</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(1)=='buku' ) active @endif"><a class="nav-link"
                            href="{{ route('buku.index') }}">Katalog</a></li>
                    <li class="@if (Request::segment(1)=='kategori' ) active @endif"><a class="nav-link"
                            href="{{ route('kategori.index') }}">Kategori</a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->pin === '44156')
            <li class="nav-item dropdown @if (Request::segment(1)=='penulis' or
                Request::segment(1)=='penerbit' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-feather-alt"></i>
                    <span>Penulis & Penerbit</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(1)=='penulis' ) active @endif"><a class="nav-link"
                            href="{{ route('penulis.index') }}">Daftar
                            Penulis</a>
                    </li>
                    <li class="@if (Request::segment(1)=='penerbit' ) active @endif"><a class="nav-link"
                            href="{{ route('penerbit.index') }}">Daftar
                            Penerbit</a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->pin === '44156')
            <li class="menu-header">
                Artikel & Kelas
            </li>
            <li class="nav-item dropdown @if (Request::segment(1)=='adminkelas' or
            Request::segment(1)=='detailkelas' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-chalkboard-teacher"></i>
                    <span>Kelas & Studio</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(1)=='adminkelas' ) active @endif"><a class="nav-link"
                            href="{{ route('adminkelas.index') }}">Katalog</a>
                    </li>
                    <li class="@if (Request::segment(1)=='detailkelas' ) active @endif"><a class="nav-link"
                            href="{{ route('detailkelas.index') }}">Studio</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown @if (Request::segment(1)=='article' or
            Request::segment(1)=='audio' ) active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pen-nib"></i>
                    <span>Artikel & Podcast</span></a>
                <ul class="dropdown-menu">
                    <li class="@if (Request::segment(1)=='article' ) active @endif"><a class="nav-link"
                            href="{{ route('article.index') }}">Katalog</a>
                    </li>
                    <li class=""><a class="nav-link"
                            href="{{ route('audio.index') }}">Podcast</a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->pin === '44156')
            <li class="menu-header">
                Informasi & Iklan
            </li>
            <li class="@if (Request::segment(1)=='informasi' ) active @endif"><a class="nav-link"
                    href="{{ route('informasi.index') }}"><i class="fas fa-info-circle"></i>
                    <span>Informasi</span></a></li>
            <li class="@if (Request::segment(1)=='iklan' ) active @endif"><a class="nav-link"
                    href="{{ route('iklan.index') }}"><i class="fas fa-bullhorn"></i>
                    <span>Iklan </span></a></li>
            @endif
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            @if (Auth::user()->pin === '44156')
            <a href="{{ url('/') }}" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-external-link-alt"></i> Go to Aplikasi
            </a>
            @endif
            @if (Auth::user()->pin !== '44156')
            <a href="{{ route('buku.index') }}" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-shopping-cart"></i> Katalog
            </a>
            @endif
            <a href="https://goo.gl/maps/x3vCX21sG1QFYnUQ6" target="_blank" class="btn btn-block btn-light mt-4 mb-3"><i
                    class="fas fa-map-marker-alt"></i> Scan QR Code</a>
            <a href="https://goo.gl/maps/x3vCX21sG1QFYnUQ6" target="_blank">
                <img src="{{ asset('qr-code.svg') }}" alt="" class="img-fluid">
            </a>
        </div>
    </aside>
</div>