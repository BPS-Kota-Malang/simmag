@extends('admin.admin-main')

@section('container')
    @include('components.topnav', ['title' => 'Status Kerja Anggota'])

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
                            <span class="mx-3 fs-4">Anggota Divisi {{ Auth::user()->divisi->nama_divisi }}</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-hover table-bordered table-stripped align-items-center"
                                id="users">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">E-mail</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Role</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">div</th>
                                        {{-- <th class="text-center text-uppercase text-xs font-weight-bolder">Opsi</th> --}}
                                    </tr>
                                </thead>

                                @php
                                    $count = 1;
                                @endphp

                                @foreach ($anggota as $data)
                                    <tr>
                                        <td class="text-center align-items-center">{{ $count++ }}</td>
                                        <td class="text-center align-items-center">{{ $data->name }}</td>
                                        <td class="text-center align-items-center">{{ $data->email }}</td>
                                        <td class="text-center align-items-center">{{ $data->role->nama_role }}</td>
                                        <td class="text-center align-items-center">{{ $data->divisi->nama_divisi }}</td>

                                        {{-- <td>
                                            <a href=# class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#editDataAdmin{{ $data->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td> --}}
                                    </tr>

                                    <!-- Modal Edit Admin -->
                                    {{-- <div class="modal fade" id="editDataAdmin{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editDataAdminLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDataAdminLabel">Edit Data Anggota</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <form action="{{ route('anggota-divisi.update', $data->id) }}"
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
                                                            <label for="roles_id">Divisi</label>
                                                            <select class="form-control" name="divisions_id" id="divisions_id"
                                                                required>

                                                                @foreach ($divisidata as $item)
                                                                    <option value="{{ $item->id }}" selected>
                                                                        {{ $item->nama_divisi }}</option>
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
                                    </div> --}}
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
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
