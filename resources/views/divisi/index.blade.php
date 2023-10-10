@extends('admin.admin-main')

@section('container')
    @include('components.topnav', ['title' => 'Data Divisi'])

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
                            <xspan class="mx-3 fs-4">Data Divisi</xspan>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="example" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Divisi</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Action</th>
                                        <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisi as $data)
                                        <tr>
                                            <!-- NO -->
                                            <td class="align-middle text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                {{ $data->name }}
                                            </td>

                                            @if ($data->divisi)
                                                <td class="align-middle text-center text-sm">
                                                    {{ $data->divisi->nama_divisi }}
                                                </td>
                                            @else
                                                <td class="align-middle text-center text-sm">
                                                    Tidak ada divisi terkait
                                                </td>
                                            @endif

                                            <!-- Action -->
                                            <td class="align-middle text-center text-sm">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#terima{{ $data->id_mahasiswa }}">
                                                    <i class="fas fa-check-square fa-lg text-success"></i>
                                                </a>
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                                    |
                                                </a>
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="modal" data-bs-target="#tolak">
                                                    <i class="fas fa-window-close fa-lg text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    </section>
@endsection
