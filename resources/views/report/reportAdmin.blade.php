@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Report Admin'])

<section class="pt-3 pb-4" id="count-stats">
    <div class="container-fluid py-4">
        <div class="col-12">

            <!-- Card Title -->
            <div class="card mb-3">
                <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-bullet-list-67 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <span class="mx-3 fs-4">Anggota Divisi {{ Auth::user()->divisi->nama_divisi }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-sm-6 mb-xl-0 mt-4 mb-4">
                    <div class="card mb-4" data-bs-toggle="modal" data-bs-target="#bulan">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <a href="#" class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;">Report Absensi</a>
                                        <h5 class="font-weight-bolder"></h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Pilih Bulan -->
                <div class="modal fade" id="bulan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terima" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="terima">Rekap Presensi Semua User Di Divisi Ini</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('report-presensi-admin') }}" method="GET"> <!-- Ubah aksi form ke URL yang benar -->
                                <div class="modal-body">
                                    Silahkan pilih bulan
                                    <select class="form-select mt-2" name="month" id="bulanSelect" aria-label="Default select example" required>
                                        <!-- Opsi bulan -->
                                        <option value="" selected disabled>Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Download</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-sm-6 mb-xl-0 mt-4 mb-4">
                <div class="card mb-4" data-bs-toggle="modal" data-bs-target="#bulanlogbook">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                    <a href="#" class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;">Report Logbook</a>
                                        <h5 class="font-weight-bolder">
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                        <a href="{{ url('/reportlogbookadmin') }}"><i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <!-- Modal Pilih Bulan -->
                                <div class="modal fade" id="bulanlogbook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terima" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="terima">Rekap Logbook Semua User Di Divisi Ini</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/reportlogbookadmin') }}" method="GET"> <!-- Ubah aksi form ke URL yang benar -->
                                <div class="modal-body">
                                    Silahkan pilih bulan
                                    <select class="form-select mt-2" name="month" id="bulanSelect" aria-label="Default select example" required>
                                        <!-- Opsi bulan -->
                                        <option value="" selected disabled>Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Download</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="card mb-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-hover table-bordered table-stripped align-items-center" id="users">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Universitas</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>

                                @php
                                $count = 1;
                                @endphp

                                @foreach ($anggota as $data)
                                <tr>
                                    <td class="text-center align-items-center">{{ $count++ }}</td>
                                    <td class="text-center align-items-center">{{ $data->name }}</td>
                                    <td class="align-middle text-center text-sm">
                                        @if($data->mahasiswa)
                                        {{ $data->mahasiswa->universitas }}
                                        @else
                                        Universitas Tidak Ditemukan
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bulan_{{ $data->id }}">Report Presensi</button>
                                        <a href="#" class="btn btn-info btn-sm">Report Logbook</a>
                                    </td>
                                </tr>

                                <!-- Modal untuk memilih bulan -->
                                <div class="modal fade" id="bulan_{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terima" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="terima">Rekap Presensi User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin-report-user', $data->id) }}" method="GET">
                                                <!-- Ubah aksi form ke URL yang benar -->

                                                <div class="modal-body">
                                                    Silahkan pilih bulan
                                                    <select class="form-select mt-2" name="month" id="bulanSelect" aria-label="Default select example" required>
                                                        <!-- Opsi bulan -->
                                                        <option value="" selected disabled>Pilih Bulan</option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                    <!-- Tombol Submit -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Download</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection