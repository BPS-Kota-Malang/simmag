<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Presensi;
use App\Models\Logbook;
use App\Models\Role;
use App\Models\StatusKerja;
use App\Models\User;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function reportUser()
    {
        return view('report.reportUser', ['menu' => 'Report']);
    }

    public function reportAdmin()
    {
        $userDivisionsId = Auth::user()->divisions_id;

        $anggota = User::with(['role', 'mahasiswa'])
            ->where('divisions_id', $userDivisionsId)
            ->whereHas('mahasiswa', function ($query) {
                $query->whereNotNull('universitas');
            })
            ->whereHas('role', function ($query) {
                $query->where('roles_id', 1); // Menambahkan kondisi ini untuk roles_id = 1
            })
            ->get();
        return view('report.reportAdmin', [
            'anggota' => $anggota,
            'menu' => 'Report'
        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDFlogbook(Request $request)
    {
        // Ambil informasi bulan yang dipilih dari permintaan
        $selectedMonth = $request->input('month');

        // Ambil informasi pengguna yang sedang login
        $user = auth()->user();

        // Periksa apakah pengguna ada
        if ($user) {
            // Ambil ID pengguna
            $userId = $user->id;

            // Ambil data logbook berdasarkan ID pengguna dan bulan yang dipilih
            $logbook = logbook::where('user_id', $userId)
                ->whereMonth('tanggal', $selectedMonth)
                ->get();

            // Jika logbook ditemukan, lanjutkan proses membuat PDF
            if ($logbook->isNotEmpty()) {
                $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
                $fileName = 'Laporan_logbook_' . str_replace(' ', '_', $user->name) . '_' . $monthName . '.pdf'; // Nama file PDF

                $data = [
                    'user' => $user, // Mengirim informasi pengguna ke tampilan PDF
                    'logbook' => $logbook,
                ];

                // Left-logo
                $imagePathLeft = public_path('assets/img/logo-bps.png');
                $typeLeft = pathinfo($imagePathLeft, PATHINFO_EXTENSION);
                $dataImageLeft = file_get_contents($imagePathLeft);
                $picLeft = 'data:image/' . $typeLeft . ';base64,' . base64_encode($dataImageLeft);

                // right-logo
                $imagePathRight = public_path('assets/img/Logo_BerAKHLAK.png');
                $typeRight = pathinfo($imagePathRight, PATHINFO_EXTENSION);
                $dataImageRight = file_get_contents($imagePathRight);
                $picRight = 'data:image/' . $typeRight . ';base64,' . base64_encode($dataImageRight);

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportlogbook', $data, compact('picLeft', 'picRight', 'data'))->render());

                // Atur opsi Dompdf jika diperlukan
                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf->setOptions($options);

                // Render PDF dengan nama file yang khusus
                $pdf->render();

                // Simpan ke file dengan nama yang sudah ditentukan
                $output = $pdf->output();
                file_put_contents($fileName, $output); // Simpan file dengan nama yang sudah ditentukan

                // Kembalikan file PDF yang dihasilkan untuk diunduh
                return response()->download($fileName)->deleteFileAfterSend(true);
            }
        }

        // Jika ada masalah atau logbook kosong, mungkin perlu ditangani di sini
        return redirect()->back()->with('error', 'Tidak ada data logbook yang ditemukan.');
    }


    public function generatePDF(Request $request)
    {
        // Ambil informasi bulan yang dipilih dari permintaan
        $selectedMonth = $request->input('month');

        // Ambil informasi pengguna yang sedang login
        $user = auth()->user();

        // Periksa apakah pengguna ada
        if ($user) {
            // Ambil ID pengguna
            $userId = $user->id;

            // Ambil data presensi berdasarkan ID pengguna dan bulan yang dipilih
            $presensi = Presensi::where('user_id', $userId)
                ->whereMonth('tgl', $selectedMonth)
                ->get();

            // Jika presensi ditemukan, lanjutkan proses membuat PDF
            if ($presensi->isNotEmpty()) {
                $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
                $fileName = 'Laporan_Presensi_' . str_replace(' ', '_', $user->name) . '_' . $monthName . '.pdf'; // Nama file PDF

                $data = [
                    'user' => $user, // Mengirim informasi pengguna ke tampilan PDF
                    'presensi' => $presensi,
                ];

                // Left-logo
                $imagePathLeft = public_path('assets/img/logo-bps.png');
                $typeLeft = pathinfo($imagePathLeft, PATHINFO_EXTENSION);
                $dataImageLeft = file_get_contents($imagePathLeft);
                $picLeft = 'data:image/' . $typeLeft . ';base64,' . base64_encode($dataImageLeft);

                // right-logo
                $imagePathRight = public_path('assets/img/Logo_BerAKHLAK.png');
                $typeRight = pathinfo($imagePathRight, PATHINFO_EXTENSION);
                $dataImageRight = file_get_contents($imagePathRight);
                $picRight = 'data:image/' . $typeRight . ';base64,' . base64_encode($dataImageRight);

                $pdf = new Dompdf(); // Menggunakan Dompdf
                $pdf->loadHtml(View::make('report.reportpresensi', $data, compact('picLeft', 'picRight', 'data'))->render());

                // Atur opsi Dompdf jika diperlukan
                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf->setOptions($options);

                // Render PDF dengan nama file yang khusus
                $pdf->render();

                // Simpan ke file dengan nama yang sudah ditentukan
                $output = $pdf->output();
                file_put_contents($fileName, $output); // Simpan file dengan nama yang sudah ditentukan

                // Kembalikan file PDF yang dihasilkan untuk diunduh
                return response()->download($fileName)->deleteFileAfterSend(true);
            } else {
                // Jika presensi kosong, kirim respons JavaScript untuk menampilkan SweetAlert
                return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan.');
            }
        } else {
            // Jika ada masalah atau presensi kosong, mungkin perlu ditangani di sini
            return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan.');
        }
    }

    public function reportpresensiadmin(Request $request)
    {
        // Ambil informasi bulan yang dipilih dari permintaan
        $selectedMonth = $request->input('month');

        // Ambil informasi pengguna yang sedang login
        $user = auth()->user();

        // Periksa apakah pengguna ada
        if ($user) {
            // Ambil ID divisi pengguna yang sedang login
            $selectedDivisionId = $user->divisions_id;

            // Ambil data presensi berdasarkan divisions_id pengguna dan bulan yang dipilih
            $presensi = Presensi::with('user.mahasiswa')->whereHas('user', function ($query) use ($selectedDivisionId) {
                $query->where('divisions_id', $selectedDivisionId)->where('roles_id', 1);
            })
                ->whereMonth('tgl', $selectedMonth)
                ->get();

            // Jika presensi ditemukan, lanjutkan proses membuat PDF
            if ($presensi->isNotEmpty()) {
                $divisionName = $user->divisi->nama_divisi; // Nama divisi
                $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
                $fileName = 'Laporan_Presensi_' . str_replace(' ', '_', $divisionName) . '_' . $monthName . '.pdf'; // Nama file PDF

                $data = [
                    'user' => $user, // Mengirim informasi pengguna ke tampilan PDF
                    'presensi' => $presensi,
                ];

                // Left-logo
                $imagePathLeft = public_path('assets/img/logo-bps.png');
                $typeLeft = pathinfo($imagePathLeft, PATHINFO_EXTENSION);
                $dataImageLeft = file_get_contents($imagePathLeft);
                $picLeft = 'data:image/' . $typeLeft . ';base64,' . base64_encode($dataImageLeft);

                // right-logo
                $imagePathRight = public_path('assets/img/Logo_BerAKHLAK.png');
                $typeRight = pathinfo($imagePathRight, PATHINFO_EXTENSION);
                $dataImageRight = file_get_contents($imagePathRight);
                $picRight = 'data:image/' . $typeRight . ';base64,' . base64_encode($dataImageRight);

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportpresensi_admin', $data, compact('picLeft', 'picRight', 'data'))->render());

                // Atur opsi Dompdf jika diperlukan
                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf->setOptions($options);

                // Render PDF dengan nama file yang khusus
                $pdf->render();

                // Simpan ke file dengan nama yang sudah ditentukan
                $output = $pdf->output();
                file_put_contents($fileName, $output); // Simpan file dengan nama yang sudah ditentukan

                // Kembalikan file PDF yang dihasilkan untuk diunduh
                return response()->download($fileName)->deleteFileAfterSend(true);
            }
        }

        // Jika ada masalah atau presensi kosong, mungkin perlu ditangani di sini
        return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan.');
    }

    public function adminreportuser(Request $request, $id)
    {
        // Ambil informasi bulan yang dipilih dari permintaan
        $selectedMonth = $request->input('month');
        $user = User::find($id);

        // Ambil informasi pengguna yang sedang login
        // $user = auth()->user();

        // Periksa apakah pengguna ada
        if ($user) {
            // Ambil ID pengguna
            // $userId = $user->id;

            // Ambil data presensi berdasarkan ID pengguna dan bulan yang dipilih
            $presensi = Presensi::where('user_id', $user->id)
                ->whereMonth('tgl', $selectedMonth)
                ->get();

            // Jika presensi ditemukan, lanjutkan proses membuat PDF
            if ($presensi->isNotEmpty()) {
                $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
                $fileName = 'Laporan_Presensi_' . str_replace(' ', '_', $user->name) . '_' . $monthName . '.pdf'; // Nama file PDF

                $data = [
                    'user' => $user, // Mengirim informasi pengguna ke tampilan PDF
                    'presensi' => $presensi,
                ];

                // Left-logo
                $imagePathLeft = public_path('assets/img/logo-bps.png');
                $typeLeft = pathinfo($imagePathLeft, PATHINFO_EXTENSION);
                $dataImageLeft = file_get_contents($imagePathLeft);
                $picLeft = 'data:image/' . $typeLeft . ';base64,' . base64_encode($dataImageLeft);

                // right-logo
                $imagePathRight = public_path('assets/img/Logo_BerAKHLAK.png');
                $typeRight = pathinfo($imagePathRight, PATHINFO_EXTENSION);
                $dataImageRight = file_get_contents($imagePathRight);
                $picRight = 'data:image/' . $typeRight . ';base64,' . base64_encode($dataImageRight);

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportpresensi_admin', $data, compact('picLeft', 'picRight', 'data'))->render());

                // Atur opsi Dompdf jika diperlukan
                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf->setOptions($options);

                // Render PDF dengan nama file yang khusus
                $pdf->render();

                // Simpan ke file dengan nama yang sudah ditentukan
                $output = $pdf->output();
                file_put_contents($fileName, $output); // Simpan file dengan nama yang sudah ditentukan

                // Kembalikan file PDF yang dihasilkan untuk diunduh
                return response()->download($fileName)->deleteFileAfterSend(true);
            }
        }

        // Jika ada masalah atau presensi kosong, mungkin perlu ditangani di sini
        return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan.');
    }
    public function reportlogbookadmin(Request $request)
    {
        // Ambil informasi bulan yang dipilih dari permintaan
        $selectedMonth = $request->input('month');

        // Ambil informasi pengguna yang sedang login
        $user = auth()->user();

        // Periksa apakah pengguna ada
        if ($user) {
            // Ambil ID divisi pengguna yang sedang login
            $selectedDivisionId = $user->divisions_id;

            // Ambil data logbook berdasarkan divisions_id pengguna dan bulan yang dipilih
            $logbook = logbook::with('user.mahasiswa')->whereHas('user', function ($query) use ($selectedDivisionId) {
                $query->where('divisions_id', $selectedDivisionId)->where('roles_id', 1);
            })
                ->whereMonth('tanggal', $selectedMonth)
                ->get();

            // Jika logbook ditemukan, lanjutkan proses membuat PDF
            if ($logbook->isNotEmpty()) {
                $divisionName = $user->divisi->nama_divisi; // Nama divisi
                $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
                $fileName = 'Laporan_Logbook_' . str_replace(' ', '_', $divisionName) . '_' . $monthName . '.pdf'; // Nama file PDF

                $data = [
                    'user' => $user, // Mengirim informasi pengguna ke tampilan PDF
                    'logbook' => $logbook,
                ];

                // Left-logo
                $imagePathLeft = public_path('assets/img/logo-bps.png');
                $typeLeft = pathinfo($imagePathLeft, PATHINFO_EXTENSION);
                $dataImageLeft = file_get_contents($imagePathLeft);
                $picLeft = 'data:image/' . $typeLeft . ';base64,' . base64_encode($dataImageLeft);

                // right-logo
                $imagePathRight = public_path('assets/img/Logo_BerAKHLAK.png');
                $typeRight = pathinfo($imagePathRight, PATHINFO_EXTENSION);
                $dataImageRight = file_get_contents($imagePathRight);
                $picRight = 'data:image/' . $typeRight . ';base64,' . base64_encode($dataImageRight);

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportlogbook_admin', $data, compact('picLeft', 'picRight', 'data'))->render());

                // Atur opsi Dompdf jika diperlukan
                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf->setOptions($options);

                // Render PDF dengan nama file yang khusus
                $pdf->render();

                // Simpan ke file dengan nama yang sudah ditentukan
                $output = $pdf->output();
                file_put_contents($fileName, $output); // Simpan file dengan nama yang sudah ditentukan

                // Kembalikan file PDF yang dihasilkan untuk diunduh
                return response()->download($fileName)->deleteFileAfterSend(true);
            }
        }

        // Jika ada masalah atau logbook kosong, mungkin perlu ditangani di sini
        return redirect()->back()->with('error', 'Tidak ada data logbook yang ditemukan.');
    }
    public function adminreportuserlogbook(Request $request, $id)
    {
        // Ambil informasi bulan yang dipilih dari permintaan
        $selectedMonth = $request->input('month');
        $user = User::find($id);

        // Ambil informasi pengguna yang sedang login
        // $user = auth()->user();

        // Periksa apakah pengguna ada
        if ($user) {
            // Ambil ID pengguna
            // $userId = $user->id;

            // Ambil data logbook berdasarkan ID pengguna dan bulan yang dipilih
            $logbook = Logbook::where('user_id', $user->id)
                ->whereMonth('tanggal', $selectedMonth)
                ->get();

            // Jika presensi ditemukan, lanjutkan proses membuat PDF
            if ($logbook->isNotEmpty()) {
                $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
                $fileName = 'Laporan_Logbook_' . str_replace(' ', '_', $user->name) . '_' . $monthName . '.pdf'; // Nama file PDF

                $data = [
                    'user' => $user, // Mengirim informasi pengguna ke tampilan PDF
                    'logbook' => $logbook,
                ];

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportlogbook_admin', $data)->render());

                // Atur opsi Dompdf jika diperlukan
                $options = new Options();
                $options->set('isRemoteEnabled', true);
                $pdf->setOptions($options);

                // Render PDF dengan nama file yang khusus
                $pdf->render();

                // Simpan ke file dengan nama yang sudah ditentukan
                $output = $pdf->output();
                file_put_contents($fileName, $output); // Simpan file dengan nama yang sudah ditentukan

                // Kembalikan file PDF yang dihasilkan untuk diunduh
                return response()->download($fileName)->deleteFileAfterSend(true);
            }
        }

        // Jika ada masalah atau presensi kosong, mungkin perlu ditangani di sini
        return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan.');

}
}