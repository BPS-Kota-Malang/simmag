<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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
        return view('mahasiswa.create');

        // $request->validate([
        //     'nim' => 'required',
        //     'nama' => 'required',
        //     'universitas' => 'required',
        //     'fakultas' => 'required',
        //     'program_studi' => 'required',
        //     'telepon' => 'required',
        //     'jumlah_anggota' => 'required',
        //     'file_proposal' => 'required|mimes:pdf',
        //     'file_suratpengantar' => 'required|mimes:pdf',
        //     'tanggal_mulai' => 'required',
        //     'tanggal_selesai' => 'required',
        // ]);
        // Mahasiswa::create($request->all());

        // return redirect()->route('create')->with('success', 'berhasil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'universitas' => 'required',
            'fakultas' => 'required',
            'program_studi' => 'required',
            'telepon' => 'required',
            'jumlah_anggota' => 'required',
            'file_proposal' => 'required|mimes:pdf', // Sesuaikan dengan format yang diperlukan
            'file_suratpengantar' => 'required|mimes:pdf', // Sesuaikan dengan format yang diperlukan
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Simpan data ke dalam tabel "mahasiswa"
        Mahasiswa::create($request->all());

        return redirect()->route('daftarmagang.create')->with('success', 'Data mahasiswa berhasil disimpan');
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
