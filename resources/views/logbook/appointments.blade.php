@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Logbook'])


<!-- Content Row -->

<div class="card">
    <div class="card-header py-3 d-flex">
        <div class="ml-auto">
        <a href="{{ route('logbook') }}" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">{{ __('Buat Logbook') }}</span>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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