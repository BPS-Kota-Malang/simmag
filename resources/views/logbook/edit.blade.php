@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Logbook'])

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
                        <xspan class="mx-3 fs-4">Data Logbook</xspan>
                    </div>
                </div>
            </div>

            <div class="card mb-4 p-3">
                <div class="card-body  px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @if(auth()->check() && auth()->user()->roles_id <= 1) <!-- Ganti $userId dengan ID pengguna yang diizinkan -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahlogbook">
                                <i class="fa fa-plus"></i>
                                Buat Logbook
                            </button>
                            @endif
                            <table class="table table-hover table-bordered table-stripped align-items-center" id="logbook">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder w-15">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Mulai</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Selesai</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Pekerjaan</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Divisi</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Edit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($logbook as $data)
                                    <tr>
                                        <td class="align-items-center text-center w-15">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{$data -> tanggal}}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{$data -> jam_mulai}}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{$data -> jam_selesai}}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{$data -> pekerjaan}}
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {{$data -> division}}
                                        <td class="align-middle text-center text-sm">
                                            <a href="{{ route('logbook.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>

                                        </td>

                                        <!-- <td class="align-middle text-center text-sm">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#terima{{ $data->id_mahasiswa }}">
                                            <i class="fas fa-check-square fa-lg text-success"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tolak">
                                            <i class="fas fa-window-close fa-lg text-danger"></i>
                                        </a>
                                    </td> -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambahlogbook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahlogbook" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Logbook</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('logbook.store') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal" required value="{{old('tanggal')}}">
                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <div class='form-group'>
                                        <input type='time' class="form-control" name="jam_mulai" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="jam_selesai">Jam Selesai</label>
                                        <input type='time' class="form-control" name="jam_selesai" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" required value="{{old('pekerjaan')}}">
                                        @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="division">Divisi</label>
                                        <select class="form-control" id="division" name="division" required>
                                            <!-- <option value="">Pilih Divisi</option> -->
                                            @foreach($division as $div)
                                            <option value="{{ $div->nama_divisi }}">{{ $div->nama_divisi }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('components/footer')

    <script>
        $('#logbook').DataTable({
            "order": [
                [0, 'asc']
            ],
            "columnDefs": [{
                    "targets": [5],
                    "orderable": false
                },
                {
                    "targets": [0, 5],
                    "className": "text-center"
                },
                {
                    "width": "130px",
                    "targets": 4
                },
                {
                    "width": "10px",
                    "targets": 3
                },

            ],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'pdf',
                    text: '<i class="fa fa-file-pdf text-danger"></i> PDF',
                    title: 'Data User',
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
                    title: 'Daftar Admin',
                    exportOptions: {
                        columns: ':visible'
                    },
                    messageTop: ''
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print text-info" > </i> PRINT',
                    title: 'Daftar Admin',
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
</section>
@endsection