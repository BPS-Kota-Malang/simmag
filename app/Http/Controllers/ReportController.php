<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Presensi;
use App\Models\Logbook;
use App\Models\Role;
use App\Models\StatusKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportlogbook', $data)->render());

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

                $pdf = new Dompdf();
                $pdf->loadHtml(View::make('report.reportpresensi', $data)->render());

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

    // public function reportpresensiadmin(Request $request)
    // {
    //     $selectedMonth = $request->input('month');
    //     $selectedDivisionId = $request->input('division_id'); // Ambil ID divisi dari permintaan

    //     $usersInDivision = User::where('divisions_id', $selectedDivisionId)->get();

    //     if ($usersInDivision->isNotEmpty()) {
    //         foreach ($usersInDivision as $user) {
    //             $userId = $user->id;

    //             $presensi = Presensi::where('user_id', $userId)
    //                 ->whereMonth('tgl', $selectedMonth)
    //                 ->get();

    //             if ($presensi->isNotEmpty()) {
    //                 $monthName = date("F", mktime(0, 0, 0, $selectedMonth, 10)); // Nama bulan
    //                 $fileName = 'Laporan_Presensi_' . str_replace(' ', '_', $user->name) . '_' . $monthName . '.pdf'; // Nama file PDF

    //                 $data = [
    //                     'user' => $user,
    //                     'presensi' => $presensi,
    //                 ];

    //                 $pdf = new Dompdf();
    //                 $pdf->loadHtml(View::make('report.reportpresensi_admin', $data)->render());

    //                 $options = new Options();
    //                 $options->set('isRemoteEnabled', true);
    //                 $pdf->setOptions($options);

    //                 $pdf->render();

    //                 $output = $pdf->output();
    //                 file_put_contents(public_path('pdf/' . $fileName), $output); // Simpan file di folder 'pdf'

    //                 // Kumpulkan file PDF yang dihasilkan untuk diunduh
    //                 $pdfFiles[] = public_path('pdf/' . $fileName);
    //             }
    //         }

    //         // Implementasi penggabungan atau zip file-file PDF di sini jika diperlukan

    //         // Kirimkan file atau file zip untuk diunduh kepada pengguna
    //         // return response()->download(...);
    //         return response()->download(public_path('pdf/' . $fileName))->deleteFileAfterSend(true);
    //     }

    //     // Tangani jika tidak ada presensi atau masalah lain
    //     return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan untuk divisi ini.');
    // }

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
        $presensi = Presensi::whereHas('user', function ($query) use ($selectedDivisionId) {
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

            $pdf = new Dompdf();
            $pdf->loadHtml(View::make('report.reportpresensi_admin', $data)->render());

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
        $logbook = Logbook::whereHas('user', function ($query) use ($selectedDivisionId) {
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

    // Jika ada masalah atau logbook kosong, mungkin perlu ditangani di sini
    return redirect()->back()->with('error', 'Tidak ada data logbook yang ditemukan.');
}
}
