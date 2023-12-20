<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Logbook Report</title>
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
            margin-top: 50px;
            /* Atur margin atas untuk elemen div */
        }

        .left-signature div {
            margin-top: 50px;
            /* Atur margin atas untuk elemen div */
        }

        .right-signature p:last-child {
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
                            <th class="text-uppercase font-weight-bolder">Tanggal</th>
                            <th class="text-uppercase font-weight-bolder">Jam Mulai</th>
                            <th class="text-uppercase font-weight-bolder">Jam Selesai</th>
                            <th class="text-uppercase font-weight-bolder">Pekerjaan</th>
                            <th class="text-uppercase font-weight-bolder">Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach($logbook as $item)
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
                            </td>
 -->
                            <td>
                                {{ $item->tanggal }}
                            </td>

                            <td>
                                {{ $item->jam_mulai }}
                            </td>

                            <td>
                                {{ $item->jam_selesai }}
                            </td>

                            <td>
                                {{ $item->pekerjaan }}
                            </td>
                            <td>
                                {{$item->divisi->nama_divisi}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TTD -->
        <footer class="footer" style="display: flex; justify-content: space-between;">
            <div class="left-signature" style="display: flex; flex-direction: column; align-items: flex-start;">
                <div style="margin-bottom: 20px;"></div>
                <p>Mengetahui,</p>
                <p>Pembimbing Lapangan</p>
                <p style="margin-bottom: 100px;"></p>
                <p>Nama TTD</p>
                <p>NIP: ...</p>
            </div>
            <div class="right-signature" style="display: flex; flex-direction: column; align-items: flex-end;">
                <div style="margin-bottom: 20px;"></div>
                <p>Kota Malang, {{ date('j F, Y') }}</p>
                <p>Ketua Divisi</p>
                <p style="margin-bottom: 100px;"></p>
                <p>Nama TTD</p>
                <p>NIP: ...</p>
            </div>
        </footer>
    </body>

</html>