<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('registerStore');
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'auth'])->name('loginProses');
Route::post('/logout', [UserController::class, 'logout'])->name('loginProses');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi')->middleware('auth');
Route::post('/presensi', [PresensiController::class, 'hadir'])->name('presensiHadir')->middleware('auth');
Route::post('/presensiPulang', [PresensiController::class, 'pulang'])->name('presensiPulang')->middleware('auth');


Route::get('/gaji', [GajiController::class, 'index'])->name('gaji')->middleware('auth');
Route::get('/rekapgaji', [GajiController::class, 'rekap'])->name('rekapgaji')->middleware('auth');
Route::get('/report', [GajiController::class, 'report'])->name('report')->middleware('auth');