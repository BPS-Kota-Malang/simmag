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
                            <i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                        <span class="mx-3 fs-4">Data Divisi</span>
                    </div>
                </div>
            </div>
            <div class="card mb-4 p-3">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        {{-- <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#createDataDivisi"> <i class="fas fa-user-plus"></i></button> --}}
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#createDataDivisi">
                            <i class="fas fa-plus" style="color: #ffffff;"></i>
                        </a>
                        <table id="divisi" class="table table-hover table-bordered table-stripped align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder w-15">No.</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Divisi</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Kuota Magang</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder w-30">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $index => $data)
                                <tr>
                                    <!-- NO -->
                                    <td class="align-items-center text-center w-15">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="align-items-center text-center">
                                        {{ $data->nama_divisi }}
                                    </td>

                                    <td class="align-items-center text-center">
                                        {{ $data->kuota_magang }}
                                    </td>

                                    <!-- Action -->
                                    <td class="align-items-center text-center w-30">
                                        {{-- <a href="javascript:;" class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                    data-bs-target="#editDataAdmin{{ $data->id }}">
                                        <i class="fas fa-edit"></i>
                                        </a>

                                        <form method="POST" action="{{ route('divisi.destroy', $data->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}

                                        <a href=# class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editDataAdmin{{ $data->id }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('divisi.destroy', $data->id) }}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    </td>
                                </tr>

                                <!-- Modal Edit Divisi -->
                                <div class="modal fade" id="editDataAdmin{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editDataAdminLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDataDivisiLabel">Ganti Divisi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('divisi.update', $data->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nama_divisi">Nama Divisi</label>
                                                        <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="{{ $data->nama_divisi }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="kuota_magang_{{ $index }}">Kuota Magang</label>
                                                        <input type="number" class="form-control" id="kuota_magang_{{ $index }}" name="kuota_magang" placeholder="Kuota Magang" value="{{ $data->kuota_magang }}">
                                                        <div class="invalid-feedback" id="kuota_magang_error_{{ $index }}"></div>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="createDataDivisi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createDataDivisi" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('divisi.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_divisi">Nama Divisi</label>
                            <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" id="nama_divisi" name="nama_divisi" placeholder="Nama Divisi" value="{{ old('nama_divisi') }}" required>
                            @error('nama_divisi')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kuota_magang">Kuota Magang</label>
                            <input type="number" class="form-control @error('kuota_magang') is-invalid @enderror" id="kuota_magang" name="kuota_magang" placeholder="Kuota Magang" value="{{ old('kuota_magang') }}" required>
                            @error('kuota_magang')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="invalid-feedback" role="alert" id="kuota_magang_error_add"></span>
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
</section>

<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>

<script>
    $('#divisi').DataTable({
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [{
                "targets": [2],
                "orderable": false
            },
            {
                "targets": [0, 2],
                "className": "text-center"
            },
            {
                "width": "130px",
                "targets": 2
            },
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf text-danger"></i> PDF',
                title: 'Data Divisi',
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

<script>
    // Ambil elemen input dan span untuk pesan kesalahan
    const inputKuotaMagang = document.getElementById('kuota_magang');
    const kuotaMagangError = document.getElementById('kuota_magang_error_add');

    // Deteksi perubahan pada input
    inputKuotaMagang.addEventListener('input', function() {
        validateKuotaMagang(this.value);
    });

    // Fungsi validasi
    function validateKuotaMagang(value) {
        const regex = /^(?:[1-9]|1[0-9]|20)$/;
        const isValid = regex.test(value);

        // Jika tidak valid, tampilkan pesan kesalahan
        if (!isValid) {
            kuotaMagangError.innerText = 'Kuota magang harus berupa angka antara 1 sampai 20.';
            inputKuotaMagang.classList.add('is-invalid');
        } else {
            kuotaMagangError.innerText = '';
            inputKuotaMagang.classList.remove('is-invalid');
        }
    }
</script>

<script>
    // Dalam skrip JavaScript Anda
    document.addEventListener('DOMContentLoaded', function() {
        const kuotaMagangInputs = document.querySelectorAll('[id^="kuota_magang_"]');

        kuotaMagangInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                validateKuotaMagang(this);
            });
        });

        function validateKuotaMagang(input) {
            const regex = /^(?:[1-9]|1[0-9]|20)$/;
            const isValid = regex.test(input.value);
            const errorElement = document.getElementById(`kuota_magang_error_${input.id.split('_').pop()}`);

            if (!isValid) {
                errorElement.innerText = 'Kuota magang harus berupa angka antara 1 sampai 20.';
                input.classList.add('is-invalid');
            } else {
                errorElement.innerText = '';
                input.classList.remove('is-invalid');
            }
        }
    });
</script>
@endsection