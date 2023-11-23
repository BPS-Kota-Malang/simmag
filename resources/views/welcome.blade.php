<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        SIMMAG - Sistem Informasi Magang
    </title>
    @include('components.core')
</head>

<body class="presentation-page">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <img src="{{ asset('assets/img/logo-bps.png') }}" width="4%">
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                            Sistem Informasi Magang
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-5 w-100">
                                <li class="nav-item ms-lg-auto">
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-info btn-round mb-0 me-1 mt-2 mt-md-0">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <header>
        <div class="page-header min-vh-100">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url(/assets/img/curved-images/bps.jpg)"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
                        <h1 class="text-gradient text-info">SIMMAG</h1>
                        <h1 class="mb-4">Sistem Informasi Magang</h1>
                        <p class="lead pe-5 me-5">BPS KOTA MALANG</p>
                        <div class="buttons">
                            <a href="{{ route('login') }}" class="btn bg-gradient-info mt-4">Login</a>
                            <!-- <button type="button" class="btn text-info shadow-none mt-4">Read more</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                    <div class="row">
                        <div class="col-md-4 position-relative">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-info"><span id="state1" countTo="70">0</span>+</h1>
                                <h5 class="mt-3">Magang Aktif</h5>
                            </div>
                            <hr class="vertical dark">
                        </div>
                        <div class="col-md-4 position-relative">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-info"> <span id="state2" countTo="15">0</span>+</h1>
                                <h5 class="mt-3">User Aktif</h5>
                            </div>
                            <hr class="vertical dark">
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-info" id="state3" countTo="4">0</h1>
                                <h5 class="mt-3">Pages</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center text-center my-sm-5">
                    <div class="col-lg-9">
                        <h2 class="text-dark mb-0">Mohon Maaf</h2>
                        <h2 class="text-info text-gradient">Untuk Saat Ini Pendaftaran Magang Ditutup!</h2>
                        <p class="lead">Dikarenakan kuota magang di BPS Kota Malang sedang penuh. Silahkan mendaftar di lain waktu </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center text-center my-sm-5">
                    <div class="col-lg">
                        <h2 class="text-dark mb-0">SIMMAG</h2>
                        <h2 class="text-info text-gradient">Sistem Informasi Magang</h2>
                        <p class="lead">SIMMAG BPS Kota Malang adalah platform pendaftaran magang yang diselenggarakan oleh Badan Pusat Statistik Kota Malang. Website ini memungkinkan calon peserta untuk mendaftar magang dengan mudah. Setelah diterima oleh admin, peserta yang berhasil akan mendapatkan akses untuk mengisi logbook dan absensi selama masa magang mereka. SIMMAG memfasilitasi proses pendaftaran, serta memberikan kemudahan bagi peserta magang untuk mencatat aktivitas dan absensi mereka selama menjalani magang di BPS Kota Malang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="mb-0">Visi Misi</h2>
                <h2 class="text-gradient text-info mb-3">BPS Kota Malang</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 px-lg-1 mt-lg-0 mt-4">
                <div class="info-horizontal bg-gray-100 border-radius-xl p-5 pb-9">
                    <div class="icon">
                        <svg class="text-info" width="25px" height="25px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>document</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-foreground" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                            <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="description ps-5">
                        <h5>Visi</h5>
                        <p>Dengan mempertimbangkan capaian kinerja, memperhatikan aspirasi masyarakat, potensi dan permasalahan, serta mewujudkan Visi Presiden dan Wakil Presiden maka visi Badan Pusat Statistik untuk tahun 2020-2024 adalah:</p>
                        <p>"Penyedia Data Statistik Berkualitas untuk Indonesia Maju"</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-4">
                <div class="info-horizontal bg-gray-100 border-radius-xl p-5">
                    <div class="icon">
                        <svg class="text-info" width="25px" height="25px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>ungroup</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-2170.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g id="ungroup" transform="translate(454.000000, 151.000000)">
                                            <path class="color-background" d="M38.1818182,10.9090909 L32.7272727,10.9090909 L32.7272727,30.9090909 C32.7272727,31.9127273 31.9127273,32.7272727 30.9090909,32.7272727 L10.9090909,32.7272727 L10.9090909,38.1818182 C10.9090909,39.1854545 11.7236364,40 12.7272727,40 L38.1818182,40 C39.1854545,40 40,39.1854545 40,38.1818182 L40,12.7272727 C40,11.7236364 39.1854545,10.9090909 38.1818182,10.9090909 Z"></path>
                                            <path class="color-foreground" d="M27.2727273,29.0909091 L1.81818182,29.0909091 C0.812727273,29.0909091 0,28.2781818 0,27.2727273 L0,1.81818182 C0,0.814545455 0.812727273,0 1.81818182,0 L27.2727273,0 C28.2781818,0 29.0909091,0.814545455 29.0909091,1.81818182 L29.0909091,27.2727273 C29.0909091,28.2781818 28.2781818,29.0909091 27.2727273,29.0909091 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="description ps-5">
                        <h5>Misi</h5>
                        <p>1. Menyediakan statistik berkualitas yang berstandar nasional dan internasional</p>
                        <p>2. Membina K/L/D/I melalui Sistem Statistik Nasional yang berkesinambungan</p>
                        <p>3. Mewujudkan pelayanan prima di bidang statistik untuk terwujudnya Sistem Statistik Nasional</p>
                        <p>4. Membangun SDM yang unggul dan adaptif berlandaskan nilai profesionalisme, integritas dan amanah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-sm-7" id="download-soft-ui">
        <div class="bg-gradient-dark position-relative m-3 border-radius-xl overflow-hidden">
            <img src="{{url('/assets/img/shapes/waves-white.svg')}}" alt="pattern-lines" class="position-absolute start-0 top-md-0 w-100 opacity-6">
            <div class="container py-7 postion-relative z-index-2 position-relative">
                <div class="row">
                    <div class="col-md-7 mx-auto text-center">
                        <h3 class="text-white mb-0">Silahkan registrasi dan daftarkan </h3>
                        <h3 class="text-info text-gradient mb-4">pengajuan magang Anda melalui website kami</h3>
                        <a href="{{ route('register') }}" class="btn btn-info btn-lg mb-3 mb-sm-0">Daftar Magang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 ms-auto">
                    <h4 class="mb-1">ANDA INGIN MENDAFTAR MAGANG?</h4>
                    <p class="lead mb-0">Silahkan registrasi dan daftarkan diri Anda!</p>
                </div>
                <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
                    <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Design%20System%20made%20by%20%40CreativeTim%20%23webdesign%20%23designsystem%20%23bootstrap5&url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-design-system" class="btn btn-info mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1"></i> Tweet
                    </a>
                </div>
            </div>
        </div>
    </div> -->

    @include('components.footer')

    <script type="text/javascript">
        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }
    </script>
</body>

</html>