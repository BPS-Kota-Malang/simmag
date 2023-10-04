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
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
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
                                    <td class="align-middle text-center text-md">
                                        {{$loop -> iteration}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> nim}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> nama}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> universitas}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> fakultas}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> program_studi}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> telepon}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> jumlah_anggota}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        <a href="{{ asset('storage/proposal/' . $data->file_proposal) }}" target="_blank">Lihat Proposal</a>
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        <a href="{{ asset('storage/pengantar/' . $data->file_suratpengantar) }}" target="_blank">Lihat Surat Pengantar</a>
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> tanggal_mulai}}
                                    </td>

                                    <td class="align-middle text-center text-md">
                                        {{$data -> tanggal_selesai}}
                                    </td>

                                    <!-- Action -->
                                    <td class="align-middle text-center text-md">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="" data-original-title="">
                                            <i class="fas fa-check-square text-success"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="" data-original-title="">
                                            <i class="fas fa-calendar-alt text-warning"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="" data-original-title="">
                                            <i class="fas fa-window-close text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection