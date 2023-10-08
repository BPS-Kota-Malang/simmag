@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Rekap Presensi User'])

<div class="container-fluid py-4">
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Rekap Presensi User</h6>
                </div>
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
            </div>
        </div>
    </div>
</div>
<section class="py-7">
    <div class="container">
        <div class="row justify-space-between py-2">
            <div class="col-lg-4 mx-auto">
                <ul class="pagination pagination-primary m-4">
                    <li class="page-item">
                        <a class="page-link" href="javascript:;" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:;">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:;" aria-label="Next">
                            <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('components/footer')
@endsection