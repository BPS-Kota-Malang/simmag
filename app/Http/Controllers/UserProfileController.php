<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */

    
    public function show(Request $request)
    {
        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
    public function showAdmin(Request $request)
    {
        return view('profile.show-admin', [
            'request' => $request,
            'user' => $request->user(),
            'menu' => 'Profile',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:110'],
            'email' => ['required', 'string', 'email', 'max:110'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.show-admin')
            ->with('success_admin', 'Berhasil mengubah Data Admin.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('profile.show-admin')->with('success', 'Password berhasil diubah.');
        } else {
            return back()->withErrors(['current_password' => 'Password terkini tidak valid.'])->withInput();
        }
    }
}
