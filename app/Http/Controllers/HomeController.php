<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $status = Auth::user()->status;

        if ($status == '2') {

            return view('admin.admin-dashboard', ['menu' => 'Dashboard']);
        } else {
            return view('homepage');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
