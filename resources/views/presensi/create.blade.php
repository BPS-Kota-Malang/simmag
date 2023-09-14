@extends('main')

@section('container')

<section class="pt-3 pb-4" id="count-stats">
    <div class="container" style="margin-top: 300px;">
        <div class="row">
            <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                <div class="row">
                    <div class="col position-relative">
                        <div class="p-3 text-center">
                            <!-- <h1 class="text-gradient text-primary"><span id="state1" countTo="70">0</span>+</h1> -->
                            <h4 class="mt-3">Jangan Lupa Absen Hari Ini!!!</h4>
                            <p class="text-sm">Kami menyambut mahasiswa dan calon magang yang berminat untuk bergabung dengan kami.
                                BPS Kota Malang membuka peluang magang bagi mahasiswa yang ingin mendalami dunia statistik dan penelitian. Daftarkan diri Anda sekarang dan mulailah perjalanan Anda ke dunia statistik yang menarik.
                            </p>
                        </div>
                        <div class="row px-9">
                            <div class="col text-center py-3">
                                <div class="col-6 mx-auto">
                                    <button type="button" class="btn bg-gradient-dark w-auto me-1 mb-0">Absen Masuk</button>
                                    <!-- <hr class="vertical dark"> -->
                                </div>
                            </div>
                            <div class="col text-center py-3">
                                <div class="col-6 mx-auto ">
                                    <button type="button" class="btn bg-gradient-dark w-auto me-1 mb-0">Absen Pulang</button>
                                    <!-- <hr class="vertical dark"> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-4 position-relative">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-primary"> <span id="state2" countTo="15">0</span>+</h1>
                                <h5 class="mt-3">Design Blocks</h5>
                                <p class="text-sm">Mix the sections, change the colors and unleash your creativity</p>
                            </div>
                            <hr class="vertical dark">
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 text-center">
                                <h1 class="text-gradient text-primary" id="state3" countTo="4">0</h1>
                                <h5 class="mt-3">Pages</h5>
                                <p class="text-sm">Save 3-4 weeks of work when you use our pre-made pages for your website</p>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection