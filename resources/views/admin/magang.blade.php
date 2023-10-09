@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Penerimaan Magang'])

<section class="pt-3 pb-4" id="count-stats">
    <div class="container-fluid py-4">
        <div class="col-12">

            <!-- Card Title -->
            <div class="card mb-3">
                <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <xspan class="mx-3 fs-4">Penerimaan Magang</xspan>
                    </div>
                </div>
            </div>
            <div class="card mb-4 p-3">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">NIM</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Universitas</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Fakultas/Jurusan</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Program Studi</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Nomor Telepon</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Jumlah Anggota</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Proposal</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Surat Pengantar</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Waktu Mulai Magang</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Waktu Selesai Magang</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Action</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                </tr>
                            </thead>
                            @foreach($magang as $data)
                            <tbody>
                                <tr>
                                    <!-- NO -->
                                    <td class="align-middle text-center text-sm">
                                        {{$loop -> iteration}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> nim}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> nama}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> universitas}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> fakultas}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> program_studi}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> telepon}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> jumlah_anggota}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ asset('storage/proposal/' . $data->file_proposal) }}" target="_blank">Lihat Proposal</a>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ asset('storage/pengantar/' . $data->file_suratpengantar) }}" target="_blank">Lihat Surat Pengantar</a>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> tanggal_mulai}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> tanggal_selesai}}
                                    </td>

                                    <!-- Action -->
                                    <td class="align-middle text-center text-sm">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#terima">
                                            <i class="fas fa-check-square fa-lg text-success"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#syarat">
                                            <i class="fas fa-calendar-alt fa-lg text-warning"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tolak">
                                            <i class="fas fa-window-close fa-lg text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        <!-- Modal Terima -->
                        <div class="modal fade" id="terima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terima" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="terima">Penerimaan Magang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menerima permohonan magang tersebut?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success">Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Syarat -->
                        <div class="modal fade" id="syarat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="syarat" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="syarat">Penerimaan Magang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        .....
                                        <!-- <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Ditolak -->
                        <div class="modal fade" id="tolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolak" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tolak">Penerimaan Magang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menolak permohonan magang tersebut?
                                        Jika Iya berikan alasannya
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Tolak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection