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
        ]);
        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
        ]);

        return redirect()->route('divisi.index')->with('message', 'Data Divisi Baru Berhasil di Tambahkan');
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
        ]);

        $divisi = Divisi::find($id);
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->save();

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui.');

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
        if($divisi) $divisi->delete();

        return redirect()->route('divisi.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }
}
