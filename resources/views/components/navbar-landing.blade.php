<nav class="navbar navbar-expand-md navbar-light shadow bg-white fs-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('codalib.svg') }}" height="25" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto text-center">
                <li class="nav-item my-1 mx-1">
                    <a class="nav-link @if (Request::segment(1)=='' ) active @endif" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item my-1 mx-1">
                    <a class="nav-link @if (Request::segment(1)=='katalog' ) active @endif" href="{{ route('katalog.index') }}">Katalog</a>
                </li>
                <li class="nav-item my-1 mx-1">
                    <a class="nav-link" href="kelas.html">Kelas Online</a>
                </li>
                <li class="nav-item my-1 mx-1">
                    <a class="nav-link" href="blog.html">E-Book</a>
                </li>
                <li class="nav-item my-1 mx-1">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
            </ul>
            @if (Route::has('login'))
                <ul class="navbar-nav ml-auto text-center">
                    @auth
                    <li class="nav-item my-1 mx-1">
                        <a class="nav-link btn btn-primary text-white btn-sm px-4 rounded-double"
                            href="{{ route('beranda.index') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item my-1 mx-1">
                        <a class="nav-link btn btn-white btn-sm px-4 rounded-double"
                            href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item my-1 mx-1">
                        <a class="nav-link btn btn-outline-white btn-sm px-4 rounded-double" href="{{ route('register') }}">Daftar</a>
                    </li>
                    @endauth
                </ul>
            @endif
        </div>
    </div>
</nav>
