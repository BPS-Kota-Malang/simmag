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
        $this->validate($request, [
            'nama' => 'required|regex:/^[a-zA-Z\s]*$/',
            'universitas' => 'required|min:10',
            'fakultas' => 'required|regex:/^[a-zA-Z\s]*$/',
            'program_studi' => 'required|regex:/^[a-zA-Z\s]*$/',
            'telepon' => 'required|numeric|min:11',
            'jumlah_anggota' => 'required|max:2',
            'file_proposal' => 'required|file|mimes:pdf',
            'file_suratpengantar' => 'required|file|mimes:pdf',
        ]);

        // Untuk Ekstensi Pdf

        $fileProposal = $request->file('file_proposal');
        $nama_fileProp = $fileProposal->getClientOriginalName();
        $fileProposal->storeAs('proposal', $nama_fileProp, 'public');

        $filePengantar = $request->file('file_suratpengantar');
        $nama_filePeng = $filePengantar->getClientOriginalName();
        $filePengantar->storeAs('pengantar', $nama_filePeng, 'public');

        $data = new Mahasiswa();
        $data->nim = $request->nim;
        $data->nama = $request->nama;
        $data->universitas = $request->universitas;
        $data->fakultas = $request->fakultas;
        $data->program_studi = $request->program_studi;
        $data->telepon = $request->telepon;
        $data->jumlah_anggota = $request->jumlah_anggota;
        $data->file_proposal = $nama_fileProp;
        $data->file_suratpengantar = $nama_filePeng;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->save();

        // Lama Berhasil

        // $fileProposal = $request->file('file_proposal');
        // $pathProposal = $fileProposal->store('proposal', 'public');

        // $filePengantar = $request->file('file_suratpengantar');
        // $pathengantar = $filePengantar->store('pengantar', 'public');

        // Percobaan Pengkondisian Button Daftar

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
