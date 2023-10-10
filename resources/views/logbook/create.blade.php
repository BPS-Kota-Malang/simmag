@extends('admin.admin-main')

@section('container')
@include('components.topnav', ['title' => 'Logbook'])


    <h1 class="card-title">Logbook</h1>
</div>
<form>
    <div class="card-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="...">
        </div>
        <div class="form-group">
            <label for="satuan">Satuan Barang</label>
            <input type="text" class="form-control" id="satuan" placeholder="...">
        </div>
        <div class="form-group">
            <label for="kategori">Kategori Barang</label>
            <input type="text" class="form-control" id="kategori" placeholder="...">
        </div>
        <div class="form-group">
            <label for="jmlbaik">Jumlah Barang Baik</label>
            <input type="text" class="form-control" id="jmlbaik" placeholder="...">
        </div>
        <div class="form-group">
            <label for="jmlrusak">Jumlah Barang Rusak</label>
            <input type="text" class="form-control" id="jmlrusak" placeholder="...">
        </div>
        <div class="form-group">
            <label>Ruangan</label>
            <select class="form-control">
                <option>null</option>
            </select>
        </div>

        <div class="form-group">
            <label for="file">Foto</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="file">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->

@include('components/footer')
@endsection