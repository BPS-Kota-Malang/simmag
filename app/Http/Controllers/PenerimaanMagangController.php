<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Divisi;
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
        $user->status = 2; // Ubah status user menjadi 2 (DITERIMA)
        $user->save();

        // Check kuota magang di divisi terkait
        $divisi = Divisi::findOrFail($request->divisi);

        // Menghitung jumlah mahasiswa dengan roles_id 1 yang telah diterima dalam divisi tersebut
        $jumlahMahasiswa = User::where('divisions_id', $request->divisi)
            ->where('roles_id', 1) // Hanya mahasiswa dengan roles_id 1
            ->count();

        // $jumlahMahasiswa += 1; // Menambah satu pendaftar baru

        if ($jumlahMahasiswa >= $divisi->kuota_magang) {
            // Ubah status kuota jika kuota terpenuhi
            $divisi->status_kuota = 1; // Magang sudah penuh pada divisi tersebut
            $divisi->save();
        }

        // EMAIL
        // Mengambil nama pendaftar
        $namaPendaftar = $mahasiswa->nama;

        // Mengambil tanggal mulai dan tanggal selesai dari pendaftar
        $tanggalMulai = $mahasiswa->tanggal_mulai;
        $tanggalSelesai = $mahasiswa->tanggal_selesai;

        // Mengirim email pemberitahuan dengan nama pendaftar
        $emailData = [
            'namaPendaftar' => $namaPendaftar,
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'body' => view('emailTerima', compact('namaPendaftar', 'tanggalMulai', 'tanggalSelesai'))->render(),
        ];

        Mail::to($user->email)->send(new SendEmail($emailData));

        return redirect()->back()->with('success_message', 'Permohonan magang berhasil diterima.');
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

        // Mengirim email pemberitahuan untuk penolakan
        $user = $mahasiswa->user;
        if ($user) {
            // Perbarui status pengguna menjadi 0 (atau status sesuai dengan kebutuhan Anda)
            $user->status = 0;
            $user->divisions_id = null;
            $user->save();
        }

        // Mengambil nama pendaftar
        $namaPendaftar = $mahasiswa->nama;

        // Mengambil tanggal mulai dan tanggal selesai dari pendaftar
        $tanggalMulai = $mahasiswa->tanggal_mulai;
        $tanggalSelesai = $mahasiswa->tanggal_selesai;

        // Mengirim email pemberitahuan dengan nama pendaftar
        $emailData = [
            'namaPendaftar' => $namaPendaftar,
            'tanggalMulai' => $tanggalMulai,
            'tanggalSelesai' => $tanggalSelesai,
            'body' => view('emailTolak', compact('namaPendaftar', 'tanggalMulai', 'tanggalSelesai'))->render(),
        ];

        Mail::to($user->email)->send(new SendEmail($emailData));

        return redirect()->back()
            ->with('tolak', 'Permohonan magang berhasil ditolak.');
    }

    public function hapus($id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($id_mahasiswa);

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }
        $user = $mahasiswa->user;
        $user->status = 0;
        $user->divisions_id = null;
        $user->save();
        $mahasiswa->delete();

        return redirect()->back()->with('hapus', 'Permohonan magang berhasil dihapus.');
    }
}
