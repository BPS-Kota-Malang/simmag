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
                        <th width="10">

                        </th>
                        <th>Nama</th>
                        <th>Asal Kampus</th>
                        <th>Tanggal</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>-</td>
                        <td>
                        </td>
                        <td>
                    </tr>
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
      <div class="modal-body">
      <div class="card-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="...">
        </div>
        <div class="form-group">
            <label for="satuan">Asal Kampus</label>
            <input type="text" class="form-control" id="satuan" placeholder="...">
        </div>
        <div class="form-group">
            <label for="kategori">Tanggal</label>
            <input type="text" class="form-control" id="kategori" placeholder="...">
        </div>
        <div class="form-group">
            <label for="jmlbaik">Jam Mulai</label>
            <input type="text" class="form-control" id="jmlbaik" placeholder="...">
        </div>
        <div class="form-group">
            <label for="jmlrusak">Jam Selesai</label>
            <input type="text" class="form-control" id="jmlrusak" placeholder="...">
        </div>
        <div class="form-group">
            <label for="jmlrusak">Keterangan</label>
            <input type="text" class="form-control" id="jmlrusak" placeholder="...">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@include('components/footer')
@endsection