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
                                <i class="ni ni-bullet-list-67 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <span class="mx-3 fs-4">Data Divisi</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            {{-- <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#createDataDivisi"> <i class="fas fa-user-plus"></i></button> --}}
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#createDataDivisi">
                                <i class="fas fa-plus" style="color: #ffffff;"></i>
                            </a>
                            <table class="table table-hover table-bordered table-stripped align-items-center" id="users">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">E-mail</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Role</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Status</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Opsi</th>
                                    </tr>
                                </thead>
    
                                @php
                                $count = 1;
                                @endphp
    
                                @foreach ($admins as $data)
    
                                <tr>
                                    <td class="text-center align-items-center">{{ $count++ }}</td>
                                    <td class="text-center align-items-center">{{ $data->name }}</td>
                                    <td class="text-center align-items-center">{{ $data->email }}</td>
                                    <td class="text-center align-items-center">{{ $data->role->nama_role }}</td>
                                    <td class="text-center align-items-center">
                                        @if ($data->status == 0)
                                        Belum Mendaftar
                                        @elseif ($data->status == 1)
                                        Telah Mendaftar
                                        @elseif ($data->status == 2)
                                        Telah Diterima
                                        @endif
                                    </td>
    
                                    <td>
                                        <a href=# class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editDataAdmin{{ $data->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
    
                                <!-- Modal Edit Admin -->
                                {{-- <div class="modal fade" id="editDataAdmin{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataAdminLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataAdminLabel">Edit Data Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ url('admin/'. $data->id ) }}" method="POST">
                                                @method('PUT')
                                                @csrf
    
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputNamaAdmin">Nama Admin</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputNamaAdmin" placeholder="Nama Admin" name="name" value="{{$data->name ?? old('name')}}" required>
                                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
    
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail">E-mail</label>
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$data->email ?? old('email')}}" required>
                                                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
    
                                                    <div class="form-group">
                                                        <label for="exampleInputTelepon">Telepon</label>
                                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Nomer Telepon" name="phone" value="{{$data->phone ?? old('phone')}}" required>
                                                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
    
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <select class="form-control" name="role" id="role" required>
                                                            @if ($data->role == 1)
                                                            <option value="1" selected>Super Admin</option>
                                                            <option value="2">Admin</option>
                                                            @elseif ($data->role == 0)
                                                            <option value="1">Super Admin</option>
                                                            <option value="2" selected>Admin</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                @endforeach
                            </table>
                        </div>
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


        <div class="modal fade" id="createDataDivisi" tabindex="-1" role="dialog" aria-labelledby="createDataDivisi"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Divisi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form method="POST" action="{{ route('divisi.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_divisi">Nama Divisi</label>
                                <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror"
                                    id="nama_divisi" name="nama_divisi" placeholder="Nama Divisi"
                                    value="{{ old('nama_divisi') }}" required>
                                @error('nama_divisi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<script>
    $('#users').DataTable({
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
                "targets": 5
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

@endsection
