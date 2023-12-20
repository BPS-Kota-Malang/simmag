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

        .logos {
            display: flex;
            justify-content: space-between;
            /* Membuat jarak di antara logo */
            position: absolute;
            /* Mengatur posisi absolut */
            top: 0;
            /* Mendorong ke atas */
            width: 100%;
            /* Mengisi lebar penuh */
        }

        /* CSS untuk gaya logo kiri */
        .left-logo {
            float: left;
            clear: both;
            text-align: left;
        }

        /* CSS untuk gaya logo kanan */
        .right-logo {
            float: right;
            text-align: right;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 100px;
            padding: 20px;
        }

        .user-info {
            text-align: left;
            /* Ubah justifikasi teks ke kiri */
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
    <div class="logos">
        <div class="left-logo">
            <img src="{{ $picLeft }}" width="15%"">
        </div>
        <div class=" right-logo">
            <img src="{{ $picRight }}" width="20%"">
        </div>
    </div>

    <div class=" header">
            <div class="user-info">
                <p style=" margin-bottom: 30px;"></p>
                <p>Nama: {{ auth()->user()->name }}</p>
            </div>
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
                            // Ambil user yang sedang login
                            $user = \App\Models\User::find(auth()->user()->id);

                            if ($user && $user->pegawai) {
                            // Tampilkan nama pegawai
                            $namaPegawai = $user->pegawai->nama_pegawai;
                            $nipPegawai = $user->pegawai->NIP; // Ambil NIP pegawai
                            } else {
                            // Jika tidak ditemukan, tampilkan pesan alternatif
                            $namaPegawai = 'Nama Pegawai Tidak Ditemukan';
                            $nipPegawai = 'NIP Pegawai Tidak Ditemukan';
                            }
                            @endphp

                            <p style="text-align: center;">{{ $namaPegawai }}</p>
                            <p style="text-align: center;">NIP: {{ $nipPegawai }}</p> <!-- Tampilkan NIP -->
                            <!-- <p>NIP: ...</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 border bg-light">
                        <div class="right-signature">
                            <div style="margin-bottom: 53px;"></div>
                            <p>Pembimbing Lapangan</p>
                            <p style="margin-bottom: 100px;"></p>
                            @php
                            // Cari user dengan role_id = 2 (Pembimbing Lapangan)
                            $pembimbing = \App\Models\User::where('roles_id', 2)->first();

                            if ($pembimbing && $pembimbing->pegawai) {
                            // Tampilkan nama pembimbing lapangan
                            $namaPembimbing = $pembimbing->pegawai->nama_pegawai;
                            $nipPembimbing = $pembimbing->pegawai->NIP; // Ambil NIP pembimbing
                            } else {
                            // Jika tidak ditemukan, tampilkan pesan alternatif
                            $namaPembimbing = 'Nama Pembimbing Tidak Ditemukan';
                            $nipPembimbing = 'NIP Pembimbing Tidak Ditemukan';
                            }
                            @endphp

                            <p style="text-align: center;">{{ $namaPembimbing }}</p>
                            <p style="text-align: center;">NIP: {{ $nipPembimbing }}</p> <!-- Tampilkan NIP -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>