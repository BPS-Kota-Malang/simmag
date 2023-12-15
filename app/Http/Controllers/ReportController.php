<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        //
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
                return $pdf->stream($fileName);
            }
        }

        // Jika ada masalah atau presensi kosong, mungkin perlu ditangani di sini
        return redirect()->back()->with('error', 'Tidak ada data presensi yang ditemukan.');
    }
}
