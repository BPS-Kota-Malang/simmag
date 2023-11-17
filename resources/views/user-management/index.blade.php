@extends('admin.admin-main')

@section('container')
    @include('components.topnav', ['title' => 'User Management'])

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
                            <span class="mx-3 fs-4">User Management</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            {{-- <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#createDataDivisi"> <i class="fas fa-user-plus"></i></button> --}}
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs btn btn-primary mt-2"
                                data-bs-toggle="modal" data-bs-target="#createDataUser">
                                <i class="fas fa-plus" style="color: #ffffff;"></i>
                            </a>
                            <table class="table table-hover table-bordered table-stripped align-items-center"
                                id="users">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">E-mail</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Role</th>
                                        {{-- <th class="text-center text-uppercase text-xs font-weight-bolder">Status</th> --}}
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
                                        {{-- <td class="text-center align-items-center">
                                        @if ($data->status == 0)
                                        Belum Mendaftar
                                        @elseif ($data->status == 1)
                                        Telah Mendaftar
                                        @elseif ($data->status == 2)
                                        Telah Diterima
                                        @endif
                                    </td> --}}

                                        <td>
                                            <a href=# class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#editDataAdmin{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('user-management.destroy', $data->id) }}"
                                                onclick="notificationBeforeDelete(event, this)"
                                                class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Admin -->
                                    <div class="modal fade" id="editDataAdmin{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editDataAdminLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDataAdminLabel">Edit Data Admin</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <form action="{{ route('user-management.update', $data->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nama</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" placeholder="Nama" name="name"
                                                                value="{{ $data->name ?? old('name') }}" required>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">E-mail</label>
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                id="email" placeholder="Masukkan Email" name="email"
                                                                value="{{ $data->email ?? old('email') }}" required>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="roles_id">Role</label>
                                                            <select class="form-control" name="roles_id" id="roles_id"
                                                                required>

                                                                @foreach ($roledata as $item)
                                                                    <option value="{{ $item->id }}" {{ $item->id == $data->roles_id ? 'selected' : '' }}>
                                                                        {{ $item->nama_role }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <div class="modal fade" id="createDataUser" tabindex="-1" role="dialog" aria-labelledby="createDataUserLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDataAdminLabel">Tambah Data Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="{{ route('user-management.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Nama" name="name" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Masukkan Email" name="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="roles_id">Role</label>
                                <select class="form-control" name="roles_id" id="roles_id" required>

                                    @foreach ($roledata as $item)
                                        <option value="{{ $item->id }}" selected>{{ $item->nama_role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="divisions_id">Divisi</label>
                                <select class="form-control" name="divisions_id" id="divisions_id" required>

                                    @foreach ($divisidata as $item)
                                        <option value="{{ $item->id }}" selected>{{ $item->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="0">Belum Mendaftar</option>
                                    <option value="1">Sudah Mendaftar</option>
                                    <option value="2">Diterima</option>
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="password">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="konfimasipassword">Konfirmasi Password</label>
                                
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if ($message = Session::get('Delete'))
            <script>
                Swal.fire(
                    'Deleted!',
                    '{{ $message }}',
                    'success'
                )
            </script>
        @endif
        @if ($message = Session::get('save_message'))
            <script>
                Swal.fire(
                    'Tersimpan!',
                    '{{ $message }}',
                    'success'
                )
            </script>
        @endif
        @if ($message = Session::get('success_message'))
            <script>
                Swal.fire(
                    'Tersimpan!',
                    '{{ $message }}',
                    'success'
                )
            </script>
        @endif
        @if ($message = Session::get('pesan_error'))
            <script>
                Swal.fire(
                    'Tersimpan!',
                    '{{ $message }}',
                    'error'
                )
            </script>
        @endif
    </section>

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
        $('#users').DataTable({
            "order": [
                [0, 'asc']
            ],
            "columnDefs": [{
                    "targets": [4],
                    "orderable": false
                },
                {
                    "targets": [0, 4],
                    "className": "text-center"
                },
                {
                    "width": "130px",
                    "targets": 4
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

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin ?',
                text: "Jika dihapus, data ini tidak akan bisa dikembalian!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus sekarang!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                }
            })
        }
    </script>
@endsection
