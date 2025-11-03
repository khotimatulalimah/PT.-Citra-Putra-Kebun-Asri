<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Decanter01Controller;
use App\Http\Controllers\RiwayatHMController;

/*
|--------------------------------------------------------------------------
| Auth (Login & Logout)
|--------------------------------------------------------------------------
*/
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Semua Halaman di Bawah Ini Wajib Login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Decanter 01
    Route::get('/decanter01', [Decanter01Controller::class, 'index'])->name('decanter.index');
    Route::post('/decanter01', [Decanter01Controller::class, 'store'])->name('decanter.store');

    // HM Page
    Route::get('/hm', function () {
        return view('HM');
    })->name('hm');

    // Riwayat HM
    Route::get('/riwayat-hm', [RiwayatHMController::class, 'index'])->name('riwayat.hm');
});

/*
|--------------------------------------------------------------------------
| Redirect Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});
