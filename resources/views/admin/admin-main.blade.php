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

    <!-- Datatables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css" />

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/argon/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/argon/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('components.sidebar')
    <main class="main-content border-radius-lg">
        @yield('container')

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

        <!-- Datatables Js -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>