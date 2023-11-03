<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $status = Auth::user()->status;
        $totaluser = User::all()->count();
        $totaldivisi = Divisi::all()->count();
        $totaldaftar = Mahasiswa::all()->count();

        $userDivisionsId = Auth::user()->divisions_id;
        // Filter data pengguna (admins) berdasarkan divisions_id.
        $totalanggota = User::where('divisions_id', $userDivisionsId)->get()->count();

        if ($status == '2') {

            return view('admin.admin-dashboard', [
                'menu' => 'Dashboard',
                'totaluser' => $totaluser,
                'totaldivisi' => $totaldivisi,
                'totaldaftar' => $totaldaftar,
                'totalanggota' => $totalanggota,
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
