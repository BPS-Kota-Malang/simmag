<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all(); // Mengambil semua data pegawai dari model Employee

        return view('employee.index', ['menu' => 'Employee', 'employees' => $employees]);
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
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'NIP' => 'required|numeric', // Menambahkan aturan validasi numeric
        ]);

        Employee::create([
            'nama_pegawai' => $request->nama_pegawai,
            'NIP' => $request->NIP,
        ]);

        return redirect()->route('employee.index')->with('save_message', 'Data pegawai berhasil ditambahkan');
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
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'NIP' => 'required|numeric', // Menambahkan aturan validasi numeric
        ]);

        $employee = Employee::find($id);
        $employee->nama_pegawai = $request->nama_pegawai;
        $employee->NIP = $request->NIP;
        $employee->save();

        return redirect()->route('employee.index')->with('success_message', 'Data pegawai berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if ($employee) $employee->delete();
        return redirect()->route('employee.index')->with('Delete', 'Berhasil menghapus data.');
    }
}
