<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Divisi;
use Illuminate\Http\Request;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magang = Mahasiswa::all(); // Ambil semua data mahasiswa
        $divisions = Divisi::all(); // Ambil semua data divisi

        $allDivisionsFull = true;
        foreach ($divisions as $division) {
            // Jika ada divisi yang belum penuh (status kuota magang != 1), set variabel $allDivisionsFull menjadi false
            if ($division->status_kuota !== 1) {
                $allDivisionsFull = false;
                break; // Jika ada divisi yang tidak penuh, hentikan pengecekan
            }
        }

        return view('admin.magang', compact('magang', 'divisions'))->with([
            'menu' => 'Penerimaan Magang',
            'allDivisionsFull' => $allDivisionsFull
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
