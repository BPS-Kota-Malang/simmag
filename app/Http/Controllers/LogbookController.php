<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use App\Models\Divisi;
use App\Models\Jam;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Edited BIma
         * 
         */
        $userDivisionsId = Auth::user()->divisions_id;
        // $user = User::all();
        $userRoleId = Auth::user()->roles_id;
        $userId = Auth::user()->id;
        // $logbook = Logbook::whereBelongsTo($user)->get();
        // $logbook = Logbook::with('user')
        //             ->where($user->divisions_id, $userDivisionsId )->get();
        if ($userRoleId == 1) {
            $logbook = Logbook::whereHas('user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->get();
        } else if ($userRoleId == 3) {
            # code...
            $logbook = Logbook::whereHas('user', function ($query) use ($userDivisionsId) {
                $query->where('divisions_id', $userDivisionsId);
            })->get();
        } else {
            $logbook = Logbook::all();
        }


        $division = Divisi::all();
        $jam = Jam::all();
        $menu = 'Logbook'; // Ambil semua data divisi dari tabel

        // dd($logbook);
        // Kirim data logbook dan divisions ke tampilan (view) appointments
        return view('logbook.appointments', compact('logbook', 'division', 'jam', 'menu'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Divisi::all(); // Ambil semua data divisi dari tabel

        // Kirim data divisi ke tampilan (view) formulir
        return view('logbook.appointments', compact('divisions'));
        // return view('logbook.appointments', ['Divisi' => $divisions]);
        // return view('logbook.create', ['menu' => 'logbook.create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the form data (custom validation rules can be applied)
        $request->validate([
            'tanggal' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
            'pekerjaan' => 'nullable|string',
            'division' => 'required|exists:divisions,nama_divisi',
            'user_id' => 'required|integer', // pastikan user_id di-validasi
        ]);

        // Simpan data ke database
        Logbook::create([
            'user_id' => Auth::id(), // mengambil ID pengguna yang saat ini login
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'pekerjaan' => $request->pekerjaan,
            'division' => $request->division,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Logbook entry created successfully');
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
            'tanggal' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
            'pekerjaan' => 'nullable|string',
            'division' => 'required|exists:divisions,nama_divisi',
            'user_id' => 'required|integer', // pastikan user_id di-validasi
        ]);

        $logbook = Logbook::find($id);
        $logbook->tanggal = $request->tanggal;
        $logbook->jam_mulai = $request->jam_mulai;
        $logbook->jam_selesai = $request->jam_selesai;
        $logbook->pekerjaan = $request->pekerjaan;
        $logbook->division = $request->division;
        $logbook->save();

        return redirect()->route('logbook.index')
            ->with('success_message', 'Berhasil mengubah Data Logbook.');
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
