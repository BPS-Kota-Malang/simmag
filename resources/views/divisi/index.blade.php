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
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#createDataDivisi">
                                <i class="fas fa-plus" style="color: #ffffff;"></i>
                            </a>
                            <table id="example" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Divisi</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisi as $data)
                                        <tr>
                                            <!-- NO -->
                                            <td class="align-middle text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                {{ $data->nama_divisi }}
                                            </td>

                                            <!-- Action -->
                                            <td class="align-middle text-center text-sm">
                                                <a href="javascript:;" class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                    data-bs-target="#editDataAdmin{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form method="POST" action="{{ route('divisi.destroy', $data->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>

                                        <!-- Modal Edit Divisi -->
                                        <div class="modal fade" id="editDataAdmin{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editDataAdminLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editDataDivisiLabel">Ganti Divisi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ route('divisi.update', $data->id) }}">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nama_divisi">Nama Divisi</label>
                                                                <input type="text" class="form-control" id="nama_divisi"
                                                                    name="nama_divisi" value="{{ $data->nama_divisi }}">
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
@endsection
