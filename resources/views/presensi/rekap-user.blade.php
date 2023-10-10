@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Rekap Presensi User'])

<section class="pt-3 pb-4" id="count-stats">
    <div class="container-fluid py-4">
        <div class="row mt-4 mx-4">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <xspan class="mx-3 fs-4">Rekap Presensi</xspan>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="form-group">
                            <label for="label">Tanggal Awal</label>
                            <input type="date" name="tglawal" id="tglawal" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="label">Tanggal Akhir</label>
                            <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                        </div>
                        <div class="form-group">
                            <a href="" onclick="this.href='/rekap-user/'+ document.getElementById('tglawal').value +
                            '/' + document.getElementById('tglakhir').value " class="btn btn-primary col-md-12">
                                Lihat
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="example" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Masuk</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Keluar</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Kerja</th>
                                        <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($presensi as $item)
                                    <tr>
                                        <!-- NO -->
                                        <td class="align-middle text-center text-sm">
                                            {{ $item->user->name }}
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            {{ $item->tgl }}
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            {{ $item->jammasuk }}
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            {{ $item->jamkeluar }}
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            {{ $item->jamkerja }}
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
    </div>
</section>
    @include('components/footer')
    @endsection