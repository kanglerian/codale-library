<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="{{ asset('logo-codale.svg') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Bootstrap CSS -->
    @stack('before-style')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/apps.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" />
    <title>CodaleLibrary - Landing Page</title>
    @stack('after-style')
</head>

<body>
    @include('components.navbar-landing')

    @yield('content')

    @include('components.footer-landing')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    @stack('before-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script>
        gsap.from('.img-banner',{duration: 0.5, delay:0.1,scale:0});
        gsap.from('.shalat',{duration: 0.5, delay: 0.2, scale:0});
        gsap.from('.kajian',{duration: 0.5, delay: 0.5, scale:0});
        gsap.from('.channel',{duration: 0.5, delay: 0.8, scale:0});
    </script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 20,
                autoplay: true,
                dots: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 1,
                    },
                },
            });
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            once: true,
        });
    </script>
    @stack('after-script')
</body>

</html>