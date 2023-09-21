<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PresensiController;
use Faker\Guesser\Name;

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
    return view('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/redirects');
    });
});

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/daftarmagang', function () {
    return view('pendaftaran.pendaftaran-magang');})->middleware('checkRole:0');
// });

// Route::get('/homepage', function () {
//     return view('homepage');
// });

// Route::get('/homepage', function () {
//     return view('homepage');
// })->middleware('checkRole:2');

// Route::get('/presensi', function () {
//     return view('presensi.create');
// });

Route::post('/simpan-masuk', [PresensiController::class, 'store'])->name('simpan-masuk');
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi');

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
