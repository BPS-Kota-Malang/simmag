@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Report'])

<section class="pt-3 pb-4" id="count-stats">
    <div class="container-fluid py-4">
        <div class="row mt-4 mx-4">
            <div class="card mb-3">
                <div class="card-body p-3 fw-bold text-dark d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                            <i class="fas fa-book text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <xspan class="mx-3 fs-4">Report</xspan>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card mb-4" data-bs-toggle="modal" data-bs-target="#bulan">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;">Report Absensi</a>
                                    <h5 class="font-weight-bolder">
                                    </h5>
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
                            <h5 class="modal-title" id="terima">Pilih Bulan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/generate-pdf" method="GET">
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

            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <a class="text-sm mb-0 text-uppercase font-weight-bold" style="color: inherit;" href="{{ url('/logbook') }}">Report Logbook</a>
                                    <h5 class="font-weight-bolder">
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <a href="{{ url('/logbook') }}"><i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('components/footer')
@endsection