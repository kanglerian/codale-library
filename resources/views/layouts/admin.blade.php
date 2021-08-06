<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('logo-codale.svg') }}">
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
    <style>
        .page-item:hover {
            background: none !important;
            border: 1px solid white !important;
        }

        .page-item:active {
            box-shadow: none !important;
        }

        .page-link:active {
            background: #135081 !important;
            border: none !important;
        }
        
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @yield('background')
            {{-- Navbar --}}
            @include('components.navbar')

            @include('components.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('components.footer')
        </div>
    </div>
    @yield('modal')
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>

</html>
