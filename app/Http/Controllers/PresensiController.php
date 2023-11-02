<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presensi.masuk', ['menu' => 'Presensi Masuk']);
    }

    public function keluar()
    {
        return view('presensi.Keluar', ['menu' => 'Presensi Keluar']);
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
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi) {
            return redirect('presensi-masuk')
                ->with('save_message', 'Anda Telah Absen Hari Ini');
        } else {
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }

        return redirect('presensi-masuk')
            ->with('save_message', 'Anda Telah Absen Hari Ini');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function halamanrekap()
    {
        return view('presensi.halaman-rekap-absen', ['menu' => 'Rekap Absen']);
    }


    public function tampildatakeseluruhan($tglawal, $tglakhir)
    {
        $presensi = Presensi::with('user')


            ->whereBetween('tgl', [$tglawal, $tglakhir])
            ->orderBy('tgl', 'asc')
            ->get();

        return view('presensi.rekap-absen', compact('presensi'), ['menu' => 'Rekap Absen Done']);
    }

    public function halamanrekapuser()
    {
        return view('presensi.halaman-rekap-user', ['menu' => 'Rekap User']);
    }

    public function tampildatauser($tglawal, $tglakhir)
    {
        $presensi = Presensi::with('user')
            ->where('user_id', auth()->user()->id)
            ->whereBetween('tgl', [$tglawal, $tglakhir])
            ->orderBy('tgl', 'asc')
            ->get();

        return view('presensi.rekap-user', compact('presensi'), ['menu' => 'Rekap Absen User']);
    }

    public function halamanrekapadmin()
    {
        return view('presensi.halaman-rekap-admin', ['menu' => 'Rekap Admin']);
    }


    public function tampildataadmin($tglawal, $tglakhir)
    {
        $user = auth()->user();
        $divisionsId = $user->divisions_id;

        $presensi = Presensi::with('user')
            ->whereIn('divisions_id', $divisionsId) // Menggunakan 'whereIn' untuk mencocokkan lebih dari satu divisions_id
            ->whereBetween('tgl', [$tglawal, $tglakhir])
            ->orderBy('tgl', 'asc')
            ->get();

        return view('presensi.rekap-admin', compact('presensi'), ['menu' => 'Rekap Absen Admin']);
    }



    public function presensipulang()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();

        $dt = [
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == "") {
            $presensi->update($dt);
            return redirect('presensi-keluar')
                ->with('success_message', 'Anda Telah Absen Pulang Hari Ini');
        } else {
            return redirect('presensi-keluar')
                ->with('success_message', 'Anda Telah Absen Pulang Hari Ini');
        }
    }

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
}
