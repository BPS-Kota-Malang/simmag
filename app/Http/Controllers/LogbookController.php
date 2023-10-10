<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use Illuminate\Support\Facades\Auth;


class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logbook = Logbook::all();
        return view('logbook.appointments', compact('logbook'), ['menu' => 'Logbook']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // 'nama' => 'required|string',
        // 'kampus' => 'required|string',
        'tanggal' => 'required|date',
        'jam_mulai' => 'required|string',
        'jam_selesai' => 'required|string',
        'keterangan' => 'nullable|string',
    ]);

    // Create a new logbook entry
    Logbook::create($request->all());

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
