@extends('main')

@section('container')

<section class="pt-3 pb-4" id="count-stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                <div class="row">
                    <div class="col-lg-11 mx-auto d-flex justify-content-center flex-column">
                        <h3 class="text-center mb-5">Daftar Magang</h3>
                        <form method="POST" action="{{ route('daftar') }}" enctype="multipart/form-data" role="form" id="contact-form" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>NIM</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" placeholder="" aria-label="NIM" type="text" name="nim" required autofocus value="{{old('nim')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label>Nama Lengkap</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="" name="nama" required value="{{old('nama')}}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Nama Perguruan Tinggi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('universitas') is-invalid @enderror" placeholder="ex: Universitas Negeri Malang" name="universitas" id="universitas" required value="{{old('universitas')}}">
                                        @error('universitas')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <p class="small text-muted">*Tuliskan nama perguruang tinggi dengan lengkap. Nama tidak boleh singkatan.</p>
                                    <p class="text-danger small" id="universitas-error"></p>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Fakultas/Jurusan</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('fakultas') is-invalid @enderror" placeholder="ex: Ekonomi dan Bisnis" aria-label="Fakultas/Jurusan" type="text" name="fakultas" id="fakultas" required value="{{old('fakultas')}}">
                                            @error('fakultas')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <p class="text-danger small" id="fakultas-error"></p>
                                    </div>
                                    <div class="col-md-6 ps-2">
                                        <label>Program Studi</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('program_studi') is-invalid @enderror" placeholder="ex: Ilmu Ekonomi" aria-label="Program Studi" name="program_studi" id="prodi" required value="{{old('program_studi')}}">
                                            @error('program_studi')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <p class="text-danger small" id="prodi-error"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('telepon') is-invalid @enderror" placeholder="ex: 082345678912" aria-label="Nomor Telepon" type="text" name="telepon" id="telepon" required value="{{old('telepon')}}">
                                            @error('telepon')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <p class="text-danger small" id="telepon-error"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jumlah Anggota Kelompok</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('jumlah_anggota') is-invalid @enderror" placeholder="ex: 1 or 12" aria-label="Jumlah Anggota Kelompok" type="text" name="jumlah_anggota" id="anggota" required value="{{old('jumlah_anggota')}}">
                                            @error('jumlah_anggota')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <p class="text-danger small" id="anggota-error"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Upload Proposal</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control @error('file_proposal') is-invalid @enderror" id="file_proposal" name="file_proposal" accept=".pdf" required">
                                            @error('file_proposal')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Upload Surat Pengantar</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control @error('file_suratpengantar') is-invalid @enderror" id="file_suratpengantar" name="file_suratpengantar" accept=".pdf" required">
                                            @error('file_suratpengantar')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
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
                                            <input class="form-control datepicker" placeholder="Tanggal Mulai" type="text" name="tanggal_mulai" required value="{{old('tanggal_mulai')}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-auto">
                                        <label>-</label>
                                    </div>

                                    <div class="col-md-5 mx-auto mb-5">
                                        <!-- <label>Waktu Pelasanaan Magang</label> -->
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input class="form-control datepicker" placeholder="Tanggal Selesai" type="text" name="tanggal_selesai" required value="{{old('tanggal_selesai')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn bg-gradient-dark w-100" id="daftar">Daftar Sekarang!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- initialization script -->
<script>
    if (document.querySelector(".datepicker")) {
        flatpickr(".datepicker", {});
    }

    document.addEventListener("DOMContentLoaded", function() {
        var universitasInput = document.getElementById("universitas");
        var universitasError = document.getElementById("universitas-error");

        universitasInput.addEventListener("input", function() {
            var inputValue = universitasInput.value.trim();
            var regex = /^.{10,}$/;
            if (!regex.test(inputValue)) {
                universitasError.textContent = "Nama perguruan tinggi harus ditulis dengan lengkap sesuai data dari pemerintah.";
            } else {
                universitasError.textContent = "";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var fakultasInput = document.getElementById("fakultas");
        var fakultasError = document.getElementById("fakultas-error");

        fakultasInput.addEventListener("input", function() {
            var inputValue = fakultasInput.value.trim();
            var regex = /^[a-zA-Z\s]{6,}$/;
            if (!regex.test(inputValue)) {
                fakultasError.textContent = "Tuliskan nama fakultas dengan benar dan lengkap tanpa singkatan.";
            } else {
                fakultasError.textContent = "";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var prodiInput = document.getElementById("prodi");
        var prodiError = document.getElementById("prodi-error");

        prodiInput.addEventListener("input", function() {
            var inputValue = prodiInput.value.trim();
            var regex = /^[a-zA-Z\s]{4,}$/;
            if (!regex.test(inputValue)) {
                prodiError.textContent = "Tuliskan nama prodi dengan benar dan lengkap tanpa singkatan.";
            } else {
                prodiError.textContent = "";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var teleponInput = document.getElementById("telepon");
        var teleponError = document.getElementById("telepon-error");

        teleponInput.addEventListener("input", function() {
            var inputValue = teleponInput.value.trim();
            var regex = /^[0-9]{11,13}$/;
            if (!regex.test(inputValue)) {
                teleponError.textContent = "Isian nomer telepon minimal 11 digit.";
            } else {
                teleponError.textContent = "";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var anggotaInput = document.getElementById("anggota");
        var anggotaError = document.getElementById("anggota-error");

        anggotaInput.addEventListener("input", function() {
            var inputValue = anggotaInput.value.trim();
            var regex = /^\d{1,2}$/;
            if (!regex.test(inputValue)) {
                anggotaError.textContent = "Tuliskan tanpa 0 contoh: 1 atau 12.";
            } else {
                anggotaError.textContent = "";
            }
        });
    });
</script>

@endsection