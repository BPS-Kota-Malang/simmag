<!-- Navbar -->

<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav x-data="{ open: false }" class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <img src="{{ asset('assets/img/logo-bps.png') }}" width="4%">
                    <a class="navbar-brand font-weight-bolder ms-sm-2" href="{{ url('/') }}" rel=" tooltip" data-placement="bottom">
                        Sistem Informasi Magang BPS Kota Malang
                    </a>

                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100 nav-right" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-12 w-100">

                            <!-- <li class="nav-item">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{route ('logbook')}}" aria-expanded="false">
                                    Status
                                </a>
                            </li> -->

                            <!-- <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="javascript:;" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                    Presensi
                                    <img src="{{asset('assets/img/down-arrow-dark.svg')}}" alt="down-arrow" class="arrow ms-1">
                                </a>
                                <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">

                                    <div class="d-none d-lg-block">

                                        <a href="{{route ('presensi-masuk')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Presensi Masuk</span>
                                        </a>

                                        <a href="{{route ('presensi-keluar')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Presensi Pulang</span>
                                        </a>
                                    </div>

                                    <div class="d-lg-none">
                                        <a href="{{route ('presensi-masuk')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Presensi Masuk</span>
                                        </a>

                                        <a href="{{route ('presensi-keluar')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Presensi Pulang</span>
                                        </a>
                                    </div>
                                </div>
                            </li> -->

                            <!-- <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{ url('/') }}" aria-expanded="false">
                                Profil
                            </a> -->
                            <!-- {{-- <li class="nav-item">

                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center me-2"
                                    href="{{ url('/register') }}" aria-expanded="false">
                            Login/Register
                            </a>
                            </li> --}} -->

                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="javascript:;" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hi, {{ Auth::user()->name }}
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="down-arrow" class="arrow rounded-circle ms-1" style="height: 30px">
                                    <!-- <img src="{{asset('assets/img/down-arrow-dark.svg')}}" alt="down-arrow" class="arrow ms-1"> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                                    <div class="d-none d-lg-block">
                                        <a href="{{route ('profile.show')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Profil</span>
                                        </a>

                                        <a href="{{route ('profile.show')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Status</span>
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="dropdown-item border-radius-md">
                                                <span class="ps-3">Logout</span>
                                            </a>
                                        </form>

                                        <!-- Jet_Stream -->
                                        <!-- <a class="dropdown-item border-radius-md">
                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>
                                        </a> -->

                                        <!-- @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                        @endif -->

                                        <!-- <a class="dropdown-item border-radius-md">
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </a> -->
                                    </div>

                                    <!-- Dropdown Resposive -->
                                    <div class="d-lg-none">
                                        <a href="{{route ('profile.show')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Profil</span>
                                        </a>

                                        <a href="{{route ('profile.show')}}" class="dropdown-item border-radius-md">
                                            <span class="ps-3">Status</span>
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="dropdown-item border-radius-md">
                                                <span class="ps-3">Logout</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->
    </div>
</div>