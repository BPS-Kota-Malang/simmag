@extends('main')

@section('container')

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
                                @if(session('pendaftaran_magang_berhasil'))

                                <a class="btn bg-gradient-dark w-auto me-1 mb-0" href="{{ url('/daftarmagang') }}" id="daftarMagangButton">Daftar Magang</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection