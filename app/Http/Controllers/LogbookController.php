<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use App\Models\Divisi;
use App\Models\Jam;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
            $logbook = Logbook::with('divisi')->whereHas('user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->get();
        } else if ($userRoleId == 3) {
            # code...
            $userDivisionsId = Auth::user()->divisions_id;
            $logbook = Logbook::where('divisions_id', $userDivisionsId)->get();
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
            'divisions_id' => 'required|integer',
            'grade' => 'required|integer',
            'user_id' => 'required|integer', // pastikan user_id di-validasi
        ]);

        // Simpan data ke database
        Logbook::create([
            'user_id' => Auth::id(), // mengambil ID pengguna yang saat ini login
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'pekerjaan' => $request->pekerjaan,
            'divisions_id' => $request->divisions_id,
            'grade' => 0,
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
            'divisions_id' => 'required|integer',
            'user_id' => 'required|integer', // pastikan user_id di-validasi
        ]);

        $logbook = Logbook::find($id);
        $logbook->tanggal = $request->tanggal;
        $logbook->jam_mulai = $request->jam_mulai;
        $logbook->jam_selesai = $request->jam_selesai;
        $logbook->pekerjaan = $request->pekerjaan;
        $logbook->divisions_id = $request->divisions_id;
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
    public function rekaplogbook($tglawal, $tglakhir)
    {
        $userDivisionsId = Auth::user()->divisions_id;
        $userRoleId = Auth::user()->roles_id;
        $userId = Auth::user()->id;

        // Memeriksa peran pengguna
        if ($userRoleId == 1) {
            $logbook = Logbook::where('user_id', $userId)
                ->whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal', 'asc')
                ->get();
        } elseif ($userRoleId == 3) {
            $logbook = Logbook::where('divisions_id', $userDivisionsId)
                ->whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal', 'asc')
                ->get();
        } else {
            $logbook = Logbook::whereBetween('tanggal', [$tglawal, $tglakhir])
                ->orderBy('tanggal', 'asc')
                ->get();
        }

        $division = Divisi::all();
        $jam = Jam::all();
        $menu = 'Logbook';

        return view('logbook.appointments', compact('logbook', 'division', 'jam', 'menu'));
    }

    // public function entry(Request $request, $id)
    // {
    //     $logbook = Logbook::find($id);

    //     $validator = $request->validate([
    //         'grade' => 'required|numeric|min:60|max:100',
    //         // pastikan user_id di-validasi
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors(['current_password' => 'Password terkini tidak valid.'])->withInput();
    //     }

    //     $logbook->grade = $request->grade;
    //     $logbook->save();

    //     return redirect()->route('logbook.index')
    //         ->with('success_message', 'Berhasil mengubah Data Logbook.');
    // }


    public function entry(Request $request, $id)
    {
        $logbook = Logbook::find($id);
        
        $logbook->grade = $request->grade;
        $validator = FacadesValidator::make($request->all(), [
            'grade' => ['required', 'numeric','regex:/^(100|[1-9]?[0-9])$/'],
            // pastikan user_id di-validasi
        ]);

        // if ($validator->fails()) {
        //     return back()->withErrors(['error_message' => 'Range Nilai Berupa Angka dari 0 -100.']);
        // }

        if ($validator->fails()) {
            return redirect()->route('logbook.index')->withErrors(['error_message' => 'Range Nilai Berupa Angka dari 0 -100.']);
        } else {
            $logbook->save();
            return redirect()->route('logbook.index')
            ->with('success_message', 'Berhasil mengubah Data Logbook.');
        }
    }
}
