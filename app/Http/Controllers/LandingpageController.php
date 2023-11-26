<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\User;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data divisi dari database
        $divisions = Divisi::all();

        // Menghitung jumlah
        $countPendaftar = User::where('status', 1)->count();
        $countMagang = User::where('status', 2)->count();
        $countUser = User::count();

        // Informasi magang penuh
        // Cek setiap divisi apakah sudah penuh atau tidak
        $allDivisionsFull = true;
        foreach ($divisions as $division) {
            // Jika ada divisi yang belum penuh (status kuota magang != 1), set variabel $allDivisionsFull menjadi false
            if ($division->status_kuota !== 1) {
                $allDivisionsFull = false;
                break; // Jika ada divisi yang tidak penuh, hentikan pengecekan
            }
        }

        // Kirim informasi $allDivisionsFull ke view landing page
        return view('welcome')
            ->with('allDivisionsFull', $allDivisionsFull)
            ->with('countPendaftar', $countPendaftar)
            ->with('countMagang', $countMagang)
            ->with('countUser', $countUser);
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
}
