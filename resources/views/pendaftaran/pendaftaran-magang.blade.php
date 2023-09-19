@extends('main')

@section('container')

<section class="pt-3 pb-4" id="count-stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                <div class="row">
                    <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                        <h3 class="text-center mb-5">Daftar Magang</h3>
                        <form role="form" id="contact-form" method="post" autocomplete="off">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>NIM</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" placeholder="" aria-label="NIM" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Nama Perguruan Tinggi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Fakultas/Jurusan</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" placeholder="" aria-label="NIM" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-2">
                                        <label>Program Studi</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="" aria-label="Last Name...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label>NIM Anggota 1</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" placeholder="" aria-label="NIM" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-7 ps-2">
                                        <label>Nama Anggota 1</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="" aria-label="Last Name...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" placeholder="" aria-label="NIM" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Upload Proposal</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile01">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Upload Surat Pengantar</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="inputGroupFile02">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Waktu Pelasanaan Magang</label>
                                    </div>
                                </div>

                                <!--  Datepicker -->
                                <div class="row">
                                    <div class="col-md-5 mx-auto">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input class="form-control datepicker" placeholder="Please select date" type="text">
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <label>-</label>
                                    </div>

                                    <div class="col-md-5 mx-auto mb-5">
                                        <!-- <label>Waktu Pelasanaan Magang</label> -->
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input class="form-control datepicker" placeholder="Please select date" type="text">
                                        </div>
                                    </div>
                                </div>

                                <!-- initialization script -->
                                <script>
                                    if (document.querySelector(".datepicker")) {
                                        flatpickr(".datepicker", {});
                                    }
                                </script>

                                <div class="col-md-12">
                                    <button type="submit" class="btn bg-gradient-dark w-100">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection