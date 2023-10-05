@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Logbook'])


<!-- Content Row -->

<div class="card">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
        </h6>
        <div class="ml-auto">
            <span class="icon text-white-50">
                <i class="fa fa-plus"></i>
            </span>
            <button type="button" class="btn btn-primary.mt-n1 {
  margin-top: -0.25rem !important;
}   ">Primary</button>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-appointment" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>Nama</th>
                        <th>Asal Kampus</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>

                        </td>
                        <td>Muhammad Akbar Rayyan Al Fath</td>
                        <td>Politeknik Negeri Jember</td>
                        <td>21 Agustus 2023</td>
                        <td>07.30</td>
                        <td>15.00</td>
                        <td>-</td>
                        <td>
                        </td>
                        <td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Content Row -->

</div>
@include('components/footer')
@endsection