@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Data Pegawai'])

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
                        <span class="mx-3 fs-4">Data Pegawai</span>
                    </div>
                </div>
            </div>

            <div class="card mb-4 p-3">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createDataPegawai">
                            <i class="fas fa-plus" style="color: #ffffff;"></i>
                        </a>
                        <div class="table-responsive p-0">
                            <table id="example" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder w-15">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama_pegawai</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">NIP</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder w-30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <!-- NO -->
                                        <td class="align-items-center text-center w-15">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="align-items-center text-center">
                                            {{ $employee->nama_pegawai }}
                                        </td>

                                        <td class="align-items-center text-center">
                                            {{ $employee->NIP }}
                                        </td>

                                        <!-- Action -->
                                        <td class="align-items-center text-center w-30">
                                            <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editDataPegawai{{ $employee->id }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('employee.destroy', $employee->id) }}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Data Pegawai -->
                                    <div class="modal fade" id="editDataPegawai{{ $employee->id }}" tabindex="-1" aria-labelledby="editDataPegawaiLabel{{ $employee->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDataPegawaiLabel{{ $employee->id }}">Edit Data Pegawai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="edit_nama_pegawai" class="form-label">Nama Pegawai</label>
                                                            <input type="text" class="form-control" id="edit_nama_pegawai" name="nama_pegawai" value="{{ $employee->nama_pegawai }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_NIP" class="form-label">NIP</label>
                                                            <input type="text" class="form-control" id="edit_NIP" name="NIP" value="{{ $employee->NIP }}">
                                                            <p class="small text-muted">*Isian hanya angka.</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="createDataPegawai" tabindex="-1" aria-labelledby="createDataPegawaiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDataDivisiLabel">Tambah Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employee.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Form untuk tambah data -->
                        <div class="mb-3">
                            <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="NIP" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="NIP" name="NIP">
                            <p class="small text-muted">*Isian hanya angka.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
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
    @if ($message = Session::get('error_message'))
    <script>
        Swal.fire(
            'Error!',
            '{{ $message }}',
            'question'
        )
    </script>
    @endif

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>
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
</section>
@endsection