<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Decanter01Controller;
use App\Http\Controllers\RiwayatHMController;
use App\Http\Controllers\HMController;

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

    Route::post('/decanter01', [HMController::class, 'storeDecanter01']);

    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Decanter 01
    Route::get('/decanter01', [Decanter01Controller::class, 'index'])->name('decanter.index');
    Route::post('/decanter01', [Decanter01Controller::class, 'store'])->name('decanter.store');

    // HM Page
    Route::get('/hm', function () {
        return view('hm');
    })->name('hm');

    // Riwayat HM
    Route::get('/riwayatHMdecanter01', [RiwayatHMController::class, 'index'])->name('riwayatHMdecanter01');

});

/*
|--------------------------------------------------------------------------
| Redirect Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});
