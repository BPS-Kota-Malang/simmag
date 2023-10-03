@switch($menu)
@case('Dashboard')
@php
$dashboard = 'active';
$magang = '';
$profile = '';
$rekap = '';
$masuk = '';
$keluar = '';
$admin = '';
@endphp
@break

@case('Penerimaan Magang')
@php
$dashboard = '';
$magang = 'active';
$profile = '';
$rekap = '';
$masuk = '';
$keluar = '';
$admin = '';
@endphp
@break

@case('Profile')
@php
$dashboard = '';
$magang = '';
$profile = 'active';
$rekap = '';
$masuk = '';
$keluar = '';
$admin = '';
@endphp
@break

@case('Rekap Absen')
@php
$dashboard = '';
$magang = '';
$profile = '';
$rekap = 'active';
$masuk = '';
$keluar = '';
$admin = '';
@endphp
@break

@case('Rekap Absen Done')
@php
$dashboard = '';
$magang = '';
$profile = '';
$rekap = 'active';
$masuk = '';
$keluar = '';
$admin = '';
@endphp
@break

@case('Presensi Masuk')
@php
$dashboard = '';
$magang = '';
$profile = '';
$rekap = '';
$masuk = 'active';
$keluar = '';
$admin = '';
@endphp
@break

@case('Presensi Keluar')
@php
$dashboard = '';
$magang = '';
$profile = '';
$rekap = '';
$masuk = '';
$keluar = 'active';
$admin = '';
@endphp
@break

@default
@endswitch

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/" target="_blank">
            <img src="{{ asset('assets/img/logo-bps.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-5 font-weight-bold">SIMMAG</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $dashboard }}" href="{{ url('/') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <!-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Presensi</h6>
            </li> -->
            <li class="nav-item">
                <a class="nav-link {{ $magang }}" href="{{ url('magang') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Penerimaan Magang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $masuk }}" href="{{ url('presensi-masuk') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-watch-time text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Presensi Masuk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $keluar }}" href="{{ url('presensi-keluar') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-watch-time text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Presensi Pulang</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $rekap }}" href="{{ url('rekap-absen') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Rekap Presensi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('rekap-absen') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logbook</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $profile }}" href="{{ route('profile.show-admin') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            @if (Auth::user()->isSuperAdmin()) {{-- Gantilah ini dengan metode autentikasi dan kondisi Anda --}}
            <li class="nav-item">
                <a class="nav-link">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            @endif
        </ul>
    </div>

</aside>