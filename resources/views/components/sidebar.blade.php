@php
    $dashboard = '';
    $magang = '';
    $profile = '';
    $rekap = '';
    $rekapuser = '';
    $rekapadmin = '';
    $masuk = '';
    $keluar = '';
    $logbook = '';
    $admin = '';
    $divisi = '';
    $user = '';
@endphp

@switch($menu)
    @case('Dashboard')
        @php
            $dashboard = 'active';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';

        @endphp
    @break

    @case('Penerimaan Magang')
        @php
            $dashboard = '';
            $magang = 'active';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Profile')
        @php
            $dashboard = '';
            $magang = '';
            $profile = 'active';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Rekap Absen')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = 'active';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';

        @endphp
    @break

    @case('Rekap Absen Done')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = 'active';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Rekap Absen User')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = 'active';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Rekap User')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = 'active';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Rekap Absen Admin')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = 'active';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Rekap Admin')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = 'active';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Presensi Masuk')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = 'active';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Presensi Keluar')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = 'active';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Logbook')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = 'active';
            $admin = '';
            $divisi = '';
            $user = '';
        @endphp
    @break

    @case('Data Divisi')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = 'active';
            $user = '';
        @endphp
    @break
    @case('Data User')
        @php
            $dashboard = '';
            $magang = '';
            $profile = '';
            $rekap = '';
            $rekapuser = '';
            $rekapadmin = '';
            $masuk = '';
            $keluar = '';
            $logbook = '';
            $admin = '';
            $divisi = '';
            $user = 'active';
        @endphp
    @break

    @default
@endswitch

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
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
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <!-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Presensi</h6>
            </li> -->
            @if (Auth::user()->isUser())
                {{-- Gantilah ini dengan metode autentikasi dan kondisi Anda --}}
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Presensi</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $masuk }}" href="{{ url('presensi-masuk') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-watch-time text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Presensi Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $keluar }}" href="{{ url('presensi-keluar') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-watch-time text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Presensi Pulang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $rekapuser }}" href="{{ url('rekap-user') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rekap Presensi User</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ $logbook }}" href="{{ url('logbook') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logbook</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $profile }}" href="{{ route('profile.show-admin') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            @if (Auth::user()->isSuperAdmin())
                {{-- Gantilah ini dengan metode autentikasi dan kondisi Anda --}}
                <li class="nav-item">
                    <a class="nav-link {{ $magang }}" href="{{ url('magang') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Penerimaan Magang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $rekap }}" href="{{ url('rekap-absen') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rekap Presensi Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $divisi }}" href="{{ url('data/divisi') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-building text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Divisi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $user }}" href="{{ url('user-management') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link {{ $user }}" href="{{ url('anggota-divisi') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Anggota Divisi</span>
                </a>
            </li>
            <li class="nav-item">
                    <a class="nav-link {{ $rekapadmin }}" href="{{ url('rekap-admin') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rekap Presensi Admin</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

</aside>
