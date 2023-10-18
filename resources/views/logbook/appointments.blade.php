@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Logbook'])


<!-- Content Row -->

<div class="card">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
        </h6>
        <div class="ml-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahlogbook">
                <i class="fa fa-plus"></i>

                Buat Logbook
            </button>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-appointment" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                
                                <th>Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Pekerjaan</th>
                                <th>Divisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logbook as $data)
                            <tr>
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
                                </td>

                                <td class="align-middle text-center text-sm">
                                        <!-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#terima{{ $data->id_mahasiswa }}">
                                            <i class="fas fa-check-square fa-lg text-success"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tolak">
                                            <i class="fas fa-window-close fa-lg text-danger"></i>
                                        </a> -->
                                    </td>
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
                            <select class="form-control" id="jam_mulai" name="jam_mulai" required>
                                <!-- <option value="">Pilih Divisi</option> -->
                                @foreach($jam as $waktu)
                                    <option value="{{ $waktu->waktu }}">{{ $waktu->waktu }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                            <label for="jam_selesai">Jam Selesai</label>
                            <select class="form-control" id="jam_selesai" name="jam_selesai" required>
                                <!-- <option value="">Pilih Divisi</option> -->
                                @foreach($jam as $waktu)
                                    <option value="{{ $waktu->waktu }}">{{ $waktu->waktu }}</option>
                                @endforeach
                            </select>
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
        @include('components/footer')
        @endsection