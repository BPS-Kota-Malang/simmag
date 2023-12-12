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
                                    <a href="" onclick="this.href='/rekap-user/'+ document.getElementById('tglawal').value +
                                    '/' + document.getElementById('tglakhir').value " class="btn btn-primary col-md-12 ">
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="rekap" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Universitas</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Divisi</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Masuk</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Keluar</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Kerja</th>
                                        <!-- <th class="text-secondary opacity-7"></th> -->
                                    </tr>
                                </thead>
                                @php
                                $count = 1;
                                @endphp
                                <tbody>
                                    @foreach($presensi as $item)
                                    <tr>
                                        <!-- NO -->
                                        <td class="text-center align-items-center">{{ $count++ }}</td>

                                        <td class="text-center align-items-center">
                                            @if($item->user)
                                            {{ $item->user->name }}
                                            @else
                                            User Tidak Ditemukan
                                            @endif
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            @if($item->user && $item->user->mahasiswa)
                                            {{ $item->user->mahasiswa->universitas }}
                                            @else
                                            Universitas Tidak Ditemukan
                                            @endif
                                        </td>

                                        <td class="text-center align-items-center">
                                            @if($item->user && $item->user->divisi)
                                            {{ $item->user->divisi->nama_divisi }}
                                            @else
                                            Divisi Tidak Ditemukan
                                            @endif
                                        </td>


                                        <td class="text-center align-items-center">
                                            {{ $item->tgl }}
                                        </td>

                                        <td class="text-center align-items-center">
                                            {{ $item->jammasuk }}
                                        </td>

                                        <td class="text-center align-items-center">
                                            {{ $item->jamkeluar }}
                                        </td>

                                        <td class="text-center align-items-center">
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

<script>
    $('#rekap').DataTable({
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [{
                "targets": [7],
                "orderable": false
            },
            {
                "targets": [0, 7],
                "className": "text-center"
            },
            {
                "width": "130px",
                "targets": 7
            },
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf text-danger"></i> PDF',
                title: 'Rekap Presensi',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: '',
                orientation: 'portrait',
                pageSize: 'A4'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel text-success" > </i> EXCEL',
                title: 'Rekap Presensi',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: ''
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print text-info" > </i> PRINT',
                title: 'Rekap Presensi',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: '',
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-table" > </i> Columns',
                postfixButtons: ['colvisRestore']
            },
        ],

        "dom": "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"

    });
</script>
@endsection