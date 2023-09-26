<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\LogbookController;
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
})->middleware('guest')->name('redirects');

Route::middleware(['auth'])->group(function () {
    Route::get('/redirects', [HomeController::Class, 'index'])->name('redirects');
});

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/daftarmagang', function () {
    return view('pendaftaran.pendaftaran-magang');
})->middleware('checkRole:0');
// });

Route::get('/daftarmagang/create', [MahasiswaController::class, 'create'])->name('daftarmagang.create');
Route::post('/daftarmagang/store', [MahasiswaController::class, 'store'])->name('daftarmagang.store');
// Route::post('/daftarmagang/create', [MahasiswaController::class, 'create'])->name('create');
// Route::get('/homepage', function () {
//     return view('homepage');
// });

// Route::get('/homepage', function () {
//     return view('homepage');
// })->middleware('checkRole:2');

// Route::get('/presensi', function () {
//     return view('presensi.create');

// });

// Route::get('/logbook', function () {
//         return view('logbook.appointments');
// });
Route::get('/logbook', [LogbookController::class,'index'])->name('logbook');

Route::post('/simpan-masuk', [PresensiController::class, 'store'])->name('simpan-masuk');
Route::get('/presensi-masuk', [PresensiController::class, 'index'])->name('presensi-masuk');
Route::get('/presensi-keluar', [PresensiController::class, 'keluar'])->name('presensi-keluar');
Route::post('/ubah-presensi', [PresensiController::class, 'presensipulang'])->name('ubah-presensi');
Route::get('rekap-absen',[PresensiController::class,'halamanrekap'])->name('rekap-absen'); 
Route::get('rekap-absen/{tglawal}/{tglakhir}',[PresensiController::class,'tampildatakeseluruhan'])->name('rekap-absen-keseluruhan');


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
