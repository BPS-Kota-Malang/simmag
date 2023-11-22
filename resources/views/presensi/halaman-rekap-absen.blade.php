@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Rekap Presensi'])

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="label">Tanggal Awal</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="label">Tanggal Akhir</label>
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <a href="" onclick="this.href='/rekap-absen/'+ document.getElementById('tglawal').value +
                                    '/' + document.getElementById('tglakhir').value " class="btn btn-primary col-md-12 ">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components/footer')

<script>
    function getTodayDate() {
        let today = new Date();
        let day = today.getDate();
        let month = today.getMonth() + 1; // January is 0
        let year = today.getFullYear();
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }
        return `${year}-${month}-${day}`;
    }

    window.onload = function() {
        let todayDate = getTodayDate();
        window.location.href = '/rekap-absen/' + todayDate + '/' + todayDate;
    };
</script>


@endsection