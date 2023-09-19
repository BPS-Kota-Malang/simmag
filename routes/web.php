<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/daftarmagang', function () {
    return view('pendaftaran.pendaftaran-magang');
});

// Route::get('/homepage', function () {
//     return view('homepage');
// });

// Route::get('/homepage', function () {
//     return view('homepage');
// })->middleware('checkRole:2');

Route::get('/presensi', function () {
    return view('presensi.create');
});

Route::get('/redirects', [HomeController::class, "index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
