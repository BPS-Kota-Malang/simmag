@section('container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Presensi Report</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        /* Misalnya, atur font, ukuran teks, dll. */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
        }

        .logo {
            /* Atur ukuran dan properti lain sesuai kebutuhan */
            width: 100px;
            /* tambahkan path atau URL gambar logo Anda */
            background-image: url('/assets/img/logo-icon.png');
            /* Ganti path logo */
            background-size: contain;
            background-repeat: no-repeat;
        }

        .user-info {
            text-align: left;
            /* Ubah justifikasi teks ke kiri */
            padding-left: 20px;
            /* Atur padding kiri */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: none;
            /* Hapus border sel dari tabel */
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .left-signature,
        .right-signature {
            /* Format TTD kiri dan kanan */
        }
    </style>
</head>
<section>

    <body>
        <div class="header">
            <div class="logo"></div>
            <div class="user-info">
                <p>Nama: {{ auth()->user()->name }}</p>
                <p>Universitas: {{ auth()->user()->mahasiswa->universitas }}</p>
                <p>Jurusan: {{ auth()->user()->mahasiswa->fakultas }}</p>
                <p>Prodi: {{ auth()->user()->mahasiswa->program_studi }}</p>
            </div>

        </div>

        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="rekap" class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase font-weight-bolder">No.</th>
                            <th class="text-uppercase font-weight-bolder">Nama</th>
                            <th class="text-uppercase font-weight-bolder">Universitas</th>
                            <th class="text-uppercase font-weight-bolder">Divisi</th>
                            <th class="text-uppercase font-weight-bolder">Tanggal</th>
                            <th class="text-uppercase font-weight-bolder">Jam Masuk</th>
                            <th class="text-uppercase font-weight-bolder">Jam Keluar</th>
                            <th class="text-uppercase font-weight-bolder">Jam Kerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach($presensi as $item)
                        <tr>
                            <!-- NO -->
                            <td>{{ $count++ }}</td>

                            <td>
                                @if($item->user)
                                {{ $item->user->name }}
                                @else
                                User Tidak Ditemukan
                                @endif
                            </td>

                            <td>
                                @if($item->user && $item->user->mahasiswa)
                                {{ $item->user->mahasiswa->universitas }}
                                @else
                                Universitas Tidak Ditemukan
                                @endif
                            </td>

                            <td>
                                @if($item->user && $item->user->divisi)
                                {{ $item->user->divisi->nama_divisi }}
                                @else
                                Divisi Tidak Ditemukan
                                @endif
                            </td>

                            <td>
                                {{ $item->tgl }}
                            </td>

                            <td>
                                {{ $item->jammasuk }}
                            </td>

                            <td>
                                {{ $item->jamkeluar }}
                            </td>

                            <td>
                                {{ $item->jamkerja }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TTD -->
        <div class="footer">
            <div class="left-signature">
                <!-- Format TTD kiri -->
            </div>
            <div class="right-signature">
                <!-- Format TTD kanan -->
            </div>
        </div>
    </body>

</html>

@if ($message = Session::get('error'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    Swal.fire(
        'Oops!',
        '{{ $message }}',
        'error'
    )
</script>
@endif
</section>
@endsection