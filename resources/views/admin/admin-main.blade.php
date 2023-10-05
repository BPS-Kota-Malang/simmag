<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>
        Admin SIMMAG
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/argon/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/css/nucleo-svg.css" rel="styleshee') }}t" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="{{ $class ?? '' }}">

    @guest
        @yield('container')
    @endguest

    @auth
        {{-- @if (in_array(request()->route()->getName(), ['', '']))
            @yield('content')
        @else
            @if (!in_array(request()->route()->getName(), ['', ''])) --}}
                <div class="min-height-300 bg-primary position-absolute w-100"></div>
           {{-- @endif --}}
            @include('components.sidebar')
                <main class="main-content border-radius-lg">
                    @yield('container')
                {{-- </main>
        @endif --}}
    @endauth

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/argon/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/argon/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/argon/js/argon-dashboard.js') }}"></script>
    @stack('js')
</body>

</html>
