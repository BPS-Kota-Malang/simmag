<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $divisi = Divisi::whereHas('divisi', function ($query) {
        //     $query->where('roles_id', 1);
        // })->get();

        // $divisi = User::with('divisi')->get();

        $divisi = Divisi::all();

        return view('divisi.index', [
            'divisi' => $divisi,
            'menu' => 'Data Divisi'

        ]);
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
        $request->validate([
            'nama_divisi' => 'required',
            'kuota_magang' => ['required', 'numeric', 'regex:/^(?:[1-9]|1[0-9]|20)$/'],
        ], [
            'kuota_magang.regex' => 'Kuota magang harus berupa angka antara 1 sampai 20.',
        ]);

        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'kuota_magang' => $request->kuota_magang,
        ]);

        return redirect()->route('divisi.index')->with('save_message', 'Data Divisi Baru Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisi = Divisi::find($id);

        return view('divisi.edit', ['divisi' => $divisi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'kuota_magang' => ['required', 'numeric', 'regex:/^(?:[1-9]|1[0-9]|20)$/'], // Validasi dengan regex untuk angka 1-20
        ]);

        $divisi = Divisi::find($id);
        $divisi->nama_divisi = $request->nama_divisi;

        // Cek apakah nilai yang dimasukkan lebih besar dari kuota_magang sebelumnya
        if ($request->kuota_magang > $divisi->kuota_magang) {
            $divisi->status_kuota = null; // Jika lebih besar, set status_kuota menjadi null
        } else {
            $divisi->status_kuota = 1; // Jika kurang dari atau sama dengan, set status_kuota menjadi 1
        }

        $divisi->kuota_magang = $request->kuota_magang;
        $divisi->save();

        return redirect()->route('divisi.index')->with('success_message', 'Divisi berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $divisi = Divisi::find($id);
        if ($divisi) $divisi->delete();
        return redirect()->route('divisi.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
