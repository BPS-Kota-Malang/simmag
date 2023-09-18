<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                    <img src="./assets/img/logo-bps.png" width="4%">
                    <a class="navbar-brand font-weight-bolder ms-sm-2" href="{{ url('/') }}" rel=" tooltip" data-placement="bottom" target="_blank">
                        Sistem Informasi Magang BPS Kota Malang
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-lg-9 ps-lg-12 w-100">
                            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{ url('/') }}" aria-expanded="false">
                                Logbook
                                <!-- <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1"> -->
                            </a>
                            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{ url('/presensi') }}" aria-expanded="false">
                                Presensi
                                <!-- <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1" /> -->
                            </a>
                            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{ url('/') }}" aria-expanded="false">
                                Profil
                                <!-- <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1"> -->
                            </a>
                            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" href="{{ url('/') }}" aria-expanded="false">
                                Login/Register
                                <!-- <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-1"> -->
                            </a>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>