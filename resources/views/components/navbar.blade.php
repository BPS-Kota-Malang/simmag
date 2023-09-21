<!-- Navbar -->

<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav x-data="{ open: false }"
                class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <img src="./assets/img/logo-bps.png" width="4%">
                    <a class="navbar-brand font-weight-bolder ms-sm-2" href="{{ url('/') }}" rel=" tooltip"
                        data-placement="bottom" target="_blank">
                        Sistem Informasi Magang BPS Kota Malang
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100 nav-right" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-lg-10 ps-lg-12 w-100">
                            <li class="nav-item">

                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                    href="{{ url('/') }}" aria-expanded="false">
                                    Logbook
                            </li>
                            </a>
                            <li class="nav-item">

                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                                    href="{{ url('/presensi') }}" aria-expanded="false">
                                    Presensi
                                </a>
                            </li>
                            <!-- <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{ url('/') }}" aria-expanded="false">
                                Profil
                            </a> -->
                            {{-- <li class="nav-item">

                                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center me-2"
                                    href="{{ url('/register') }}" aria-expanded="false">
                                    Login/Register
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn-sm dropdown-toggle btn-round mb-0 me-1 mt-2 mt-md-0 pt-1"
                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img alt="image"
                                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
                                            alt="profile_image" class="rounded-circle mr-1" style="height: 30px">
                                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                                        <div class="mt-1 space-y-1">
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Account') }}
                                                </div>
                    
                                                <x-jet-dropdown-link href="user/profile">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>
                    
                                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-jet-dropdown-link>
                                                @endif
                    
                                                <div class="border-t border-gray-100"></div>
                    
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                    
                                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                        {{ __('Log Out') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
