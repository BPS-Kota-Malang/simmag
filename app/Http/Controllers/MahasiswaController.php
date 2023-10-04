<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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
        // $request->validate([
        //     'nim' => 'required',
        //     'nama' => 'required',
        //     'universitas' => 'required',
        //     'fakultas' => 'required',
        //     'program_studi' => 'required',
        //     'telepon' => 'required',
        //     'jumlah_anggota' => 'required',
        //     'file_proposal' => 'required|mimes:pdf', // Sesuaikan dengan format yang diperlukan
        //     'file_suratpengantar' => 'required|mimes:pdf', // Sesuaikan dengan format yang diperlukan
        //     'tanggal_mulai' => 'required|date',
        //     'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        // ]);

        // Simpan data ke dalam tabel "mahasiswa"
        Mahasiswa::create($request->all());
        $validatedData = $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/',
            'universitas' => 'required|min:10',
            'fakultas' => 'required|regex:/^[a-zA-Z\s]*$/',
            'program_studi' => 'required|regex:/^[a-zA-Z\s]*$/',
            'telepon' => 'required|numeric|min:11',
            'jumlah_anggota' => 'required|max:2',
            'file_proposal' => 'required|file|mimes:pdf', // Sesuaikan dengan format yang diperlukan
            'file_suratpengantar' => 'required|file|mimes:pdf', // Sesuaikan dengan format yang diperlukan
        ]);

        $fileProposal = $request->file('file_proposal');
        $pathProposal = $fileProposal->store('proposal', 'public');

        $filePengantar = $request->file('file_suratpengantar');
        $pathengantar = $filePengantar->store('pengantar', 'public');

        // $user = Auth::user(); // Mengambil objek pengguna yang saat ini login
        // $user->pendaftaran_magang_berhasil = false;
        // $user->save();

        // session()->forget('pendaftaran_magang_berhasil');
        session()->put('pendaftaran_magang_berhasil', true);
        return redirect()->route('redirects');
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
