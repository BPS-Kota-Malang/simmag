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
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table id="rekap" class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">No.</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Nama</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Universitas</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Divisi</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Tanggal</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Masuk</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Keluar</th>
                        <th class="text-center text-uppercase text-xs font-weight-bolder">Jam Kerja</th>
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
</body>
</html>
