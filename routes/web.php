<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cek-validasi', [HomeController::class, 'view_cekvalidasi'])->name('validasi');
Route::post('/cek-validasi', [HomeController::class, 'cek_validasi'])->name('cek.validasi');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/buku-tanah', [DashboardController::class, 'buku_tanah'])->name('buku.tanah');
    Route::get('/buku-tanah/{id}', [DashboardController::class, 'detail'])->name('detail');

    Route::get('/peminjaman/{id}', [DashboardController::class, 'peminjaman_detail'])->name('peminjaman.detail');
    Route::post('/peminjaman/{id}', [DashboardController::class, 'peminjaman_store'])->name('peminjaman.store');

    Route::get('/pengembalian/{id}', [DashboardController::class, 'pengembalian_detail'])->name('pengembalian.detail');
    Route::post('/pengembalian/{id}', [DashboardController::class, 'pengembalian_store'])->name('pengembalian.store');

    Route::get('/riwayat-peminjaman-pengembalian', [DashboardController::class, 'riwayat'])->name('riwayat');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dokumen-plotting', [DashboardController::class, 'dokumen_plotting'])->name('dokumen.plotting');
    Route::get('/dokumen-plotting/{id}', [DashboardController::class, 'dokumen_plotting_detail'])->name('dokumen.plotting.detail');
    Route::put('/dokumen-plotting/{id}', [DashboardController::class, 'dokumen_plotting_status'])->name('dokumen.plotting.status');
    Route::get('/peminjaman', [DashboardController::class, 'peminjaman'])->name('peminjaman');
    Route::post('/buku-tanah', [DashboardController::class, 'buku_tanah_import'])->name('buku.tanah.import');
    Route::get('/arsip-ploting', [DashboardController::class, 'arsip_ploting'])->name('arsip.ploting');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login_view'])->name('login');
    Route::get('/register', [AuthController::class, 'register_view'])->name('register');
});
Route::post('/login', [AuthController::class, 'login_auth'])->name('login.auth');
Route::post('/register', [AuthController::class, 'register_auth'])->name('register.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

