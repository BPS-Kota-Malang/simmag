@extends('main')

@section('container')

<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('./assets/img/curved-images/bps.jpg')">
        <span class="mask bg-gradient-info opacity-5"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">SIMMAG</h1>
                    <p class="lead text-white mt-3">Sistem Informasi Magang <br /> Badan Pusat Statistik (BPS) Kota Malang </p>
                </div>
            </div>
        </div>

        <div class="position-absolute w-100 z-index-1 bottom-0">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="moving-waves">
                    <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                    <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                    <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                    <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                </g>
            </svg>
        </div>
    </div>
</header>

<section class="pt-3 pb-4" id="count-stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                <div class="row">
                    <div class="col position-relative">
                        <div class="p-3 text-center">
                            <!-- <h1 class="text-gradient text-primary"><span id="state1" countTo="70">0</span>+</h1> -->
                            <h4 class="mt-3">Selamat datang di Website Pendaftaran Magang BPS Kota Malang!</h4>
                            <p class="text-sm">Kami menyambut mahasiswa dan calon magang yang berminat untuk bergabung dengan kami.
                                BPS Kota Malang membuka peluang magang bagi mahasiswa yang ingin mendalami dunia statistik dan penelitian. Daftarkan diri Anda sekarang dan mulailah perjalanan Anda ke dunia statistik yang menarik.
                            </p>
                        </div>
                        <div class="row text-center py-3">
                            <div class="col-12 mx-auto">
                                <button type="button" class="btn bg-gradient-dark w-auto me-1 mb-0">Daftar Magang</button>
                                <!-- <hr class="vertical dark"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection