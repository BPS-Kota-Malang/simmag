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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> -->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/argon/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/argon/css/nucleo-svg.css" rel="styleshee') }}t" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/argon/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
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

        <!-- Datatables Js -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->

        <script>
            // $(document).ready(function() {
            //     $('#example').DataTable();
            // });
            // new DataTable('#example');
            let table = new DataTable('#example');
        </script>

        <!-- SweetAlert -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            $(function() {
                $(document).on('click', '#daftar', function(e) {
                    e.preventDefault();
                    var link = $(this).attr("href");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            });
        </script> -->
</body>

</html>