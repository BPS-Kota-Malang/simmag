<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\StatusKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDivisionsId = Auth::user()->divisions_id;

        // Filter data pengguna (admins) berdasarkan divisions_id.
        $anggota = User::with(['role', 'statusKerja'])->where('divisions_id', $userDivisionsId)->get();
        $roledata = Role::all();
        $divisidata = Divisi::all();
        $statusKerjaAnggota = StatusKerja::all();

        return view('anggota-divisi.index', [
            'anggota' => $anggota,
            'roledata' => $roledata,
            'divisidata' => $divisidata,
            'statusKerjaAnggota' => $statusKerjaAnggota,
            'menu' => 'Data User'
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
        $request->validate([
            'name' => ['required', 'string', 'max:110'],
            'email' => ['required', 'string', 'email', 'max:110'],
            'divisions_id' => ['required', 'integer', 'max:3'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $anggota = User::find($id);
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->divisions_id = $request->divisions_id;
        // $anggota->password = Hash::make($request->password);
        $anggota->save();

        return redirect()->route('anggota-divisi.index')
            ->with('success_message', 'Berhasil memindahkan Anggota.');
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

    public function getUsersByStatus($status_kerjas_id)
    {
        $users = User::where('status_kerjas_id', $status_kerjas_id)->get();
        return response()->json($users);
    }
}
