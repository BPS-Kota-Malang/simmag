<?php

use App\Http\Controllers\AnggotaDivisiController;
use App\Http\Controllers\DivisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\StatusMagangUser;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\StatusMagangUserController;
use App\Http\Controllers\PenerimaanMagangController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', [LandingpageController::class, 'index'])->name('landingpage.index');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/logbook', [LogbookController::class, 'index'])->name('logbook.index');
Route::get('/logbook/create', [LogbookController::class, 'create'])->name('logbook.create');
Route::post('/logbook/store', [LogbookController::class, 'store'])->name('logbook.store');
Route::put('/logbook/update/{id}', [LogbookController::class, 'update'])->name('logbook.update');
Route::put('/logbook/entry/{id}', [LogbookController::class, 'entry'])->name('logbook.entry');
Route::get('/logbook/{tglawal}/{tglakhir}', [LogbookController::class, 'rekaplogbook'])->name('logbook.rekap');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});


// ROUTE GROUP SUPERADMIN ONLY
Route::middleware(['auth', 'checkStatus:2', 'checkRole:2', 'verified'])->group(function () {
    Route::resource('user-management', \App\Http\Controllers\UserManagementController::class);
    Route::get('user-management/edit/{id}', [UserManagementController::class, 'edit'])->name('user-management.edit');
    Route::put('user-management/update/{id}', [UserManagementController::class, 'update'])->name('user-management.update');
    Route::resource('/data/divisi', \App\Http\Controllers\DivisiController::class);
    Route::get('/data/divisi/edit/{id}', [DivisiController::class, 'edit'])->name('divisi.edit');
    Route::put('/data/divisi/update/{id}', [DivisiController::class, 'update'])->name('divisi.update');
    Route::get('rekap-absen', [PresensiController::class, 'halamanrekap'])->name('rekap-absen');
    Route::get('rekap-absen/{tglawal}/{tglakhir}', [PresensiController::class, 'tampildatakeseluruhan'])->name('rekap-absen-keseluruhan');
    Route::get('/magang', [MagangController::class, 'index'])->name('magang');
    Route::post('/magang/terima/{id_mahasiswa}', [PenerimaanMagangController::class, 'update'])->name('magang.terima');
    Route::post('/magang/tolak/{id_mahasiswa}', [PenerimaanMagangController::class, 'destroy'])->name('magang.tolak');
    Route::post('/magang/hapus/{id_mahasiswa}', [PenerimaanMagangController::class, 'hapus'])->name('magang.hapus');
    Route::get('/download/proposal/{id_mahasiswa}', [MahasiswaController::class, 'download_proposal'])->name('download.proposal');
    Route::get('/download/surat/{id_mahasiswa}', [MahasiswaController::class, 'download_surat'])->name('download.surat');
    Route::get('/admin/reset-password/{id}', [UserManagementController::class, 'resetPassword'])->name('user-management.reset-password');
});

// ROUTE GROUP ADMIN ONLY
Route::middleware(['auth', 'checkStatus:2', 'checkRole:3', 'verified'])->group(function () {
    Route::resource('/anggota-divisi', AnggotaDivisiController::class);
    Route::get('/anggota-divisi/edit/{id}', [AnggotaDivisiController::class, 'edit'])->name('anggota-divisi.edit');
    Route::put('/anggota-divisi/update', [AnggotaDivisiController::class, 'update'])->name('anggota-divisi.update');
    Route::get('rekap-admin', [PresensiController::class, 'halamanrekapadmin'])->name('rekap-absen-admin');
    Route::get('rekap-admin/{tglawal}/{tglakhir}', [PresensiController::class, 'tampildataadmin'])->name('rekap-admin');
    Route::get('/getUsersByStatus/{status}', [AnggotaDivisiController::class, 'getUsersByStatus']);
});

// ROUTE GROUP USER 
Route::middleware(['auth', 'checkRole:1', 'verified'])->group(function () {
    Route::get('/daftarmagang', function () {
        return view('pendaftaran.pendaftaran-magang');
    })->name('daftarmagang');
    Route::post('/daftar', [MahasiswaController::class, 'store'])->name('daftar');
});

// ROUTE GROUP USER DITERIMA
Route::middleware(['auth', 'checkStatus:2', 'checkRole:1', 'verified'])->group(function () {
});
Route::post('/simpan-masuk', [PresensiController::class, 'store'])->name('simpan-masuk');
Route::get('/presensi-masuk', [PresensiController::class, 'index'])->name('presensi-masuk');
Route::get('/presensi-keluar', [PresensiController::class, 'keluar'])->name('presensi-keluar');
Route::post('/ubah-presensi', [PresensiController::class, 'presensipulang'])->name('ubah-presensi');
Route::get('rekap-user', [PresensiController::class, 'halamanrekapuser'])->name('rekap-absen-user');
Route::get('rekap-user/{tglawal}/{tglakhir}', [PresensiController::class, 'tampildatauser'])->name('rekap-user');
Route::get('reportUser', [ReportController::class, 'reportUser'])->name('reportUser');

// ROUTE GROUP PROFILE DITERIMA
Route::middleware(['auth', 'checkStatus:2', 'verified'])->group(function () {
    Route::resource('users', \App\Http\Controllers\UserProfileController::class);
    Route::get('/user/profile-admin', [UserProfileController::class, 'showAdmin'])->name('profile.show-admin');
    Route::post('/user/password/update', [UserProfileController::class, 'updatePassword'])->name('ganti.password');
});
