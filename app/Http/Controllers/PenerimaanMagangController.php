<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;

class PenerimaanMagangController extends Controller
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
    public function update(Request $request, $id_mahasiswa)
    {
        // Validasi input
        $request->validate([
            'divisi' => 'required|integer', // Pastikan input divisi valid
        ]);

        // Temukan mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id_mahasiswa);

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        // Ubah status mahasiswa menjadi 2 (diterima)
        $mahasiswa->status = 2;
        $mahasiswa->save();

        // Temukan user yang terkait dengan mahasiswa
        $user = User::find($mahasiswa->user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Ubah roles_id user jika perlu
        // Misalnya, jika roles_id 1 adalah role untuk mahasiswa, ubah menjadi role yang sesuai untuk pegawai.

        // Set divisi user
        $user->divisions_id = $request->input('divisi');
        $user->save();

        return redirect()->back()->with('success', 'Penerimaan magang berhasil.');
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
