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
                                        <input type="text" class="form-control @error('universitas') is-invalid @enderror" placeholder="ex: Universitas Brawijaya" name="universitas" id="universitas" required value="{{old('universitas')}}">
                                        @error('universitas')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Fakultas/Jurusan</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('fakultas') is-invalid @enderror" placeholder="ex: Ekonomi dan Bisnis" aria-label="Fakultas/Jurusan" type="text" name="fakultas" required value="{{old('fakultas')}}">
                                            @error('fakultas')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 ps-2">
                                        <label>Program Studi</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control @error('program_studi') is-invalid @enderror" placeholder="ex: Ilmu Ekonomi" aria-label="Program Studi" name="program_studi" required value="{{old('program_studi')}}">
                                            @error('program_studi')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nomor Telepon</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('telepon') is-invalid @enderror" placeholder="" aria-label="Nomor Telepon" type="text" name="telepon" required value="{{old('telepon')}}">
                                            @error('telepon')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jumlah Anggota Kelompok</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('jumlah_anggota') is-invalid @enderror" placeholder="ex: 1 or 12" aria-label="Jumlah Anggota Kelompok" type="text" name="jumlah_anggota" required value="{{old('jumlah_anggota')}}">
                                            @error('jumlah_anggota')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- <hr class="horizontal dark mb-4"> -->

                                <!-- <div class="col-auto">
                                    <label>*Tambah Anggota Kelompok (Opsional)</label>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label>NIM Anggota</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" placeholder="" aria-label="NIM" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-5 ps-2">
                                        <label>Nama Anggota</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="" aria-label="Last Name...">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ps-2 align-self-end">
                                        <button class="btn bg-gradient-dark btn-icon" type="button">
                                            <div class="d-flex align-items-center">
                                                <i class="ni ni-fat-add me-2" aria-hidden="true"></i>
                                                Tambah
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Nama Mahasiswa</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </tbody>
                                </table> -->

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
                                    <button type="submit" class="btn bg-gradient-dark w-100">Daftar Sekarang!</button>
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
</script>

@endsection