@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Penerimaan Magang'])

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
                        <xspan class="mx-3 fs-4">Penerimaan Magang</xspan>
                    </div>
                </div>
            </div>
            <div class="card mb-4 p-3">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="col-md-12">
                            <button type="button" class="btn bg-gradient-dark w-10" id="filterStatus">Filter</button>

                        </div>
                        <table id="example" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">NIM</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Universitas</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Fakultas/Jurusan</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Program Studi</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Nomor Telepon</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Jumlah Anggota</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Proposal</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Surat Pengantar</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Waktu Mulai Magang</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Waktu Selesai Magang</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Created</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Kode Status</th>
                                    <th class="text-center text-uppercase text-xs font-weight-bolder">Action</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($magang) && count($magang) > 0)
                                @foreach($magang as $data)
                                <tr>
                                    <!-- NO -->
                                    <td class="align-middle text-center text-sm">
                                        {{$loop -> iteration}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> nim}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> nama}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> universitas}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> fakultas}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> program_studi}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> telepon}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> jumlah_anggota}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ asset('storage/proposal/' . $data->file_proposal) }}" target="_blank">Lihat Proposal</a>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ asset('storage/pengantar/' . $data->file_suratpengantar) }}" target="_blank">Lihat Surat Pengantar</a>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> tanggal_mulai}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> tanggal_selesai}}
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        {{$data -> created_at}}
                                    </td>
                                    <td class="align-middle text-center text-sm user-status">{{ $data->user->status }}</td>


                                    <!-- Action -->
                                    <td class="align-middle text-center text-sm">
                                        @if ($data->user->status == 2) <!-- Anggap 2 mewakili status "DITERIMA" -->
                                        <span class="text-success font-weight-bold text-xs">DITERIMA</span>
                                        @elseif ($data->user->status == 0)
                                        <span class="text-danger font-weight-bold text-xs">TOLAK</span>
                                        @else
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#terima{{ $data->id_mahasiswa }}">
                                            <i class="fas fa-check-square fa-lg text-success"></i>
                                        </a>
                                        <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                            |
                                        </a>
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#tolak{{ $data->id_mahasiswa }}">
                                            <i class="fas fa-window-close fa-lg text-danger"></i>
                                        </a>
                                        @endif
                                    </td>

                                    <!-- Modal Terima -->
                                    <div class="modal fade" id="terima{{ $data->id_mahasiswa }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="terima" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="terima">Penerimaan Magang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{url('magang/terima/'.$data->id_mahasiswa)}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menerima permohonan magang tersebut?
                                                        <select class="form-select" name="divisi" aria-label="Default select example" required>
                                                            <option value="" selected disabled>Pilih Divisi</option>
                                                            <option value="1">Divisi 1</option>
                                                            <option value="2">Divisi 2</option>
                                                            <option value="3">Divisi 3</option>
                                                            <option value="4">Divisi 4</option>
                                                            <option value="5">Divisi 5</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Terima</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Ditolak -->
                                    <div class="modal fade" id="tolak{{ $data->id_mahasiswa }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tolak" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tolak">Penerimaan Magang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="{{url('magang/tolak/'.$data->id_mahasiswa)}}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menolak permohonan magang tersebut?
                                                        <div class="mt-3">
                                                            <!-- <label for="alasanpenolakan" class="form-label">Alasan Penolakan</label> -->
                                                            <!-- <textarea class="form-control" id="alasanpenolakan" name="alasanpenolakan" rows="3"></textarea> -->
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                <tr>
                                    <td colspan="13" class="align-middle text-center text-sm">Data kosong.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script>
        $(document).ready(function() {
            $('#filterStatus').click(function() {
                // Tampilkan semua baris terlebih dahulu
                $('table tbody tr').show();

                // Sembunyikan baris dengan status selain "1"
                $('table tbody tr').each(function() {
                    var status = $(this).find('.user-status').text();
                    if (status !== '1') {
                        $(this).hide();
                    }
                });
            });

        });
    </script>
</section>
@endsection