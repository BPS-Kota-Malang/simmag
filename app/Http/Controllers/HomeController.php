<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Mahasiswa;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $status = Auth::user()->status;
        $totaluser = User::all()->count();
        $totaldivisi = Divisi::all()->count();
        $totaldaftar = Mahasiswa::all()->count();

        $user = Auth::user();
        $totalJamKerja = DB::table('presensis')
            ->where('user_id', $user->id)
            ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(jamkerja))) as total_jam_kerja"))
            ->first();

        // Hasilnya akan tersedia dalam format jam:menit:detik
        $totaljamkerjaformatted = $totalJamKerja->total_jam_kerja;

        $userDivisionsId = Auth::user()->divisions_id;
        // Filter data pengguna (admins) berdasarkan divisions_id.
        $totalanggota = User::where('divisions_id', $userDivisionsId)->get()->count();

        if ($status == '2') {

            return view('admin.admin-dashboard', [
                'totaluser' => $totaluser,
                'totaldivisi' => $totaldivisi,
                'totaldaftar' => $totaldaftar,
                'totalanggota' => $totalanggota,
                'totaljamkerjaformatted' => $totaljamkerjaformatted,
                'menu' => 'Dashboard',
            ]);
        } else {
            return view('homepage');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
