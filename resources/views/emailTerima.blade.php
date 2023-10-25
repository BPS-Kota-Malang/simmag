<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BPS Kota Malang</title>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                    <tr>
                        <td style="background-color: #f0f0f0; padding: 20px; text-align: center;">
                            <h1 style="color: #333;">Badan Pusat Statistik Kota Malang</h1>
                            <p style="font-size: 16px; color: #555;">Hi, {{ $namaPendaftar }}</p>
                            <p style="font-size: 16px; color: #555;">Pengajuan permohonan magang Anda pada tanggal {{ $tanggalMulai }} sampai dengan tanggal {{ $tanggalSelesai }}</p>
                            <h2 style="color: green;">DITERIMA</h2>
                            <a href="{{ url('/login') }}" target="_blank" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px; display: inline-block; cursor: pointer;">Silahkan
                                Login Kembali</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>