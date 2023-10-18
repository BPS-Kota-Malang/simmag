<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
        // Temukan mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);

        // Validasi dan simpan data
        $request->validate([
            'divisi' => 'required|integer|between:1,5', // Pastikan divisi berada dalam rentang 1-5
        ]);

        // Temukan pengguna yang sesuai berdasarkan kunci asing
        $user = $mahasiswa->user;

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Edit data pengguna yang sesuai
        $user->divisions_id = $request->divisi;
        $user->status = 2; // Ubah status user menjadi 2
        $user->save();

        // Mengirim email pemberitahuan
        $emailData = [
            'body' => view('emailTerima')->render(), // Mengambil tampilan email yang telah Anda siapkan
        ];

        Mail::to($user->email)->send(new SendEmail($emailData)); // Menggunakan SendEmail untuk mengirim email

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mahasiswa)
    {
        // Temukan mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        // Hapus data mahasiswa


        // Mengirim email pemberitahuan untuk penolakan
        $user = $mahasiswa->user;
        if ($user) {
            // Perbarui status pengguna menjadi 0 (atau status sesuai dengan kebutuhan Anda)
            $user->status = 0;
            $user->divisions_id = null;
            $user->save();
        }

        if ($user) {
            $emailData = [
                'body' => view('emailTolak')->render(), // Mengambil tampilan email yang sesuai
            ];

            Mail::to($user->email)->send(new SendEmail($emailData));
        }

        return redirect()->back()->with('success', 'Permohonan magang telah ditolak.');
    }
}
