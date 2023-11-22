<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('presensi.keluar', ['menu' => 'Presensi Keluar']);
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

    //Menghitung Jarak
    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }


    public function store(Request $request)
    {
        $latitudekantor = -8.00122092617956;
        $longitudekantor = 112.62118425338326;
        $lokasi = $request->lokasi;

        // Pemrosesan koordinat user
        $lokasiuser = explode(",", $lokasi);
        $latitudeuser = $lokasiuser[0];
        $longitudeuser = $lokasiuser[1];
        // dd($lokasi);

        // Menghitung jarak antara koordinat user dan kantor dalam meter
        $jarak = $this->distance($latitudekantor, $longitudekantor, $latitudeuser, $longitudeuser);
        $radius = round($jarak["meters"]);
        // dd($radius);

        // Pengecekan apakah user berada dalam radius 100m
        // Pengecekan apakah user berada dalam radius 100m
        if (Auth::user()->status_kerjas_id == 1) {
            if ($radius > 100) {
                return redirect('presensi-masuk')->with('error_message', 'Maaf, Anda diluar radius absensi');
            } else {
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
                        ->with('save_message', 'Anda Telah Mengisi Absen Hari Ini');
                } else {
                    Presensi::create([
                        'user_id' => auth()->user()->id,
                        'tgl' => $tanggal,
                        'jammasuk' => $localtime,
                    ]);
                }

                return redirect('presensi-masuk')
                    ->with('success_message', 'Anda Telah Absen Hari Ini');
            }
        } else {
            $timezone = 'Asia/Jakarta';
            $date = new DateTime('now', new DateTimeZone($timezone));
            $tanggal = $date->format('Y-m-d');
            $localtime = $date->format('H:i:s');
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }
        return redirect('presensi-masuk')
            ->with('success_message', 'Anda Telah Absen Hari Ini');
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
        $userDivisionsId = Auth::user()->divisions_id;

        $presensi = Presensi::join('users', 'presensis.user_id', '=', 'users.id')
            ->where('users.divisions_id', $userDivisionsId)
            ->whereBetween('presensis.tgl', [$tglawal, $tglakhir])
            ->orderBy('presensis.tgl', 'asc')
            ->get();

        return view('presensi.rekap-admin', compact('presensi'), ['menu' => 'Rekap Absen Admin']);
    }



    public function presensipulang(Request $request)
    {

        $latitudekantor = -8.00122092617956;
        $longitudekantor = 112.62118425338326;
        $lokasi = $request->lokasi;

        // Pemrosesan koordinat user
        $lokasiuser = explode(",", $lokasi);
        $latitudeuser = $lokasiuser[0];
        $longitudeuser = $lokasiuser[1];
        // dd($lokasi);

        // Menghitung jarak antara koordinat user dan kantor dalam meter
        $jarak = $this->distance($latitudekantor, $longitudekantor, $latitudeuser, $longitudeuser);
        $radius = round($jarak["meters"]);

        if (Auth::user()->status_kerjas_id == 1) {
            if ($radius <= 100) {

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
                        ->with('save_message', 'Anda Telah Melakukan Absen Pulang Hari Ini');
                }
            } else {
                // Jika diluar radius, user tidak dapat melakukan absen pulang
                return redirect('presensi-keluar')->with('error_message', 'Maaf, Anda diluar radius absensi');
            }
        } else {
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
                    ->with('save_message', 'Anda Telah Melakukan Absen Pulang Hari Ini');
            }
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
