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
            /* background-image: url('/assets/img/logo-bps (1).png'); */
        }

        .user-info {
            text-align: left;
            /* Ubah justifikasi teks ke kiri */
            padding-left: 20px;
            /* Atur padding kiri */
        }

        .user-info p {
            margin: 5px 0;
            /* Berikan margin antar paragraf */
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

        .left-signature {
            /* Format TTD kiri */
            float: left;
            /* Atur posisi kiri */
            clear: both;
            /* Pastikan tidak ada elemen lain di sebelah kiri */
            text-align: left;
            /* Atur teks menjadi rata kiri */
        }

        .right-signature {
            /* Format TTD kanan */
            float: right;
            /* Atur posisi kanan */
            text-align: right;
            /* Atur teks menjadi rata kanan */
        }

        .right-signature p {
            margin: 5px 0;
            /* Berikan margin antar paragraf */
        }

        .left-signature p {
            margin: 5px 0;
            /* Berikan margin antar paragraf */
        }

        .right-signature div {
            margin-top: 1cqb;
            /* Atur margin atas untuk elemen div */
        }

        .left-signature div {
            margin-top: 10px;
            /* Atur margin atas untuk elemen div */
        }

        .right-signature p:last-child {
            margin-bottom: 30px;
            /* Atur margin bawah untuk teks terakhir */
        }

        .right-date {
            /* Format TTD kanan */
            float: right;
            /* Atur posisi kanan */
            text-align: right;
            /* Atur teks menjadi rata kanan */
        }

        .right-date p {
            margin: 5px 0;
            /* Berikan margin antar paragraf */
        }

        .right-date div {
            margin-top: 50px;
            /* Atur margin atas untuk elemen div */
        }

        .right-date p:last-child {
            margin-bottom: 30px;
            /* Atur margin bawah untuk teks terakhir */
        }

        /* .right-signature .signature-line {
            width: 200px;
            border-bottom: 1px solid #000;
            margin-bottom: 20px;
            float: right;
        } */
    </style>
</head>

<body>
    <div class="logo">
        <img src="{{ storage_path('app/logo-bps.png') }}">
    </div>
    <div class="header">
        <div class="user-info">
            <p>Nama : {{ auth()->user()->name }}</p>
            <p>Universitas : {{ auth()->user()->mahasiswa->universitas }}</p>
            <p>Jurusan : {{ auth()->user()->mahasiswa->fakultas }}</p>
            <p>Prodi : {{ auth()->user()->mahasiswa->program_studi }}</p>
            <p>Divisi : {{ auth()->user()->divisi->nama_divisi }}</p>
        </div>
    </div>

    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table id="rekap" class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase font-weight-bolder">No.</th>
                        <!-- <th class="text-uppercase font-weight-bolder">Nama</th>
                        <th class="text-uppercase font-weight-bolder">Universitas</th>
                        <th class="text-uppercase font-weight-bolder">Divisi</th> -->
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

                        <!-- <td>
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
                        </td> -->

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
    <footer class="footer" style="display: flex; justify-content: space-between;">
        <div class="container">
            <div class="row g-2">
                <!-- <div class="col-6">
                    <div class="p-3 border bg-light">Custom column padding</div>
                </div> -->
                <div class="col-6" style="margin-top: 40px;">
                    <div class="p-3 border bg-light" style="text-align: right;">
                        <p>Kota Malang, {{ date('j F, Y') }}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 border bg-light">
                        <div class="left-signature">
                            <div style="margin-bottom: 20px;"></div>
                            <p>Mengetahui,</p>
                            <p>Ketua Divisi</p>
                            <p style="margin-bottom: 100px;"></p>
                            @php
                            $division = \App\Models\Divisi::find(auth()->user()->divisions_id);
                            $namaKetua = $division ? $division->nama_ketua : 'Nama Ketua Tidak Ditemukan';
                            @endphp
                            <p style="text-align: center;">{{ $namaKetua }}</p>
                            <!-- <p>NIP: ...</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 border bg-light">
                        <div class="right-signature">
                            <div style="margin-bottom: 60px;"></div>
                            <p>Pembimbing Lapangan</p>
                            <p style="margin-bottom: 100px;"></p>
                            <p style="text-align: center;">{{ \App\Models\User::find(1)->name }}</p>
                            <p style="text-align: center;">NIP: ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>