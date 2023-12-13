<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::with('role')->get();
        $roledata = Role::all();
        $divisidata = Divisi::all();

        return view('user-management.index', [
            'admins' => $admins,
            'roledata' => $roledata,
            'divisidata' => $divisidata,
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'roles_id' => ['required', 'string', 'max:3'],
            'divisions_id' => ['required', 'string', 'max:3'],
            'status' => ['required', 'string', 'max:1'],
            // 'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles_id' => $request->roles_id,
            'divisions_id' => $request->divisions_id,
            'status' => $request->status,
            'password' => Hash::make('password'),
            // 'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user-management.index')
            ->with('save_message', 'Data admin baru telah berhasil disimpan.');
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
            'roles_id' => ['required', 'integer', 'max:3'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admins = User::find($id);
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->roles_id = $request->roles_id;
        // $admins->password = Hash::make($request->password);
        $admins->save();

        return redirect()->route('user-management.index')
            ->with('success_message', 'Berhasil mengubah Data User.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $admins = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('user-management.index')
            ->with('pesan_error', 'Anda tidak dapat menghapus diri sendiri.');
        if ($admins) $admins->delete();
        return redirect()->route('user-management.index')
            ->with('Delete', 'Berhasil menghapus data.');
    }

    public function resetPassword($id)
{
    $user = User::find($id);

    if ($user) {
        $user->password = Hash::make('bps03573');
        $user->save();

        return redirect()->route('user-management.index')->with('success_message', 'Password reset successfully!');
    }

    return redirect()->route('user-management.index')->with('error', 'User not found.');
}

}
