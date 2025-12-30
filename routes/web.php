<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Decanter01Controller;
use App\Http\Controllers\Decanter02Controller;
use App\Http\Controllers\Separator01Controller;
use App\Http\Controllers\Separator02Controller;
use App\Http\Controllers\Separator03Controller;
use App\Http\Controllers\Genset02Controller;
use App\Http\Controllers\Turbine01Controller;
use App\Http\Controllers\Turbine02Controller;
use App\Http\Controllers\PressKap20_01Controller;
use App\Http\Controllers\Press02Controller;
use App\Http\Controllers\Press03Controller;
use App\Http\Controllers\Press04Controller;
use App\Http\Controllers\Press05Controller;
use App\Http\Controllers\Press06Controller;
use App\Http\Controllers\Hydrocyclone01Controller;
use App\Http\Controllers\RippleMill01Controller;
use App\Http\Controllers\RippleMill03Controller;
use App\Http\Controllers\EmptyBunchPressController;
use App\Http\Controllers\IdFanBoilerController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\ServiceDecanter01Controller;

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // HM Page
    Route::get('/hm', function () {
        return view('hm');
    })->name('hm');

<<<<<<< HEAD
    // HM Page
    Route::get('/riwayatmesin', function () {
        return view('riwayatmesin');
    })->name('riwayatmesin');

    // Riwayat HM
=======
    // =========================
    // Data Service Umum
    // =========================
    Route::get('/tambahservice', [DataServiceController::class, 'index']);
    Route::post('/tambahservice', [DataServiceController::class, 'store']);
    Route::get('/dataservice', [DataServiceController::class, 'riwayat']);

    // =========================
    // RIWAYAT HM MESIN
    // =========================

>>>>>>> 7ffd0b7652bcd5a7e5c377f40f16c1478d75ec75
    Route::get('/decanter01', [Decanter01Controller::class, 'index']);
    Route::post('/decanter01', [Decanter01Controller::class, 'store']);
    Route::get('/riwayatHMdecanter01', [Decanter01Controller::class, 'riwayat']);
    Route::get('/decanter01/edit/{id}', [Decanter01Controller::class, 'edit']);
    Route::put('/decanter01/update/{id}', [Decanter01Controller::class, 'update']);
    Route::delete('/decanter01/delete/{id}', [Decanter01Controller::class, 'destroy']);

    Route::get('/decanter02', [Decanter02Controller::class, 'index']);
    Route::post('/decanter02', [Decanter02Controller::class, 'store']);
    Route::get('/riwayatHMdecanter02', [Decanter02Controller::class, 'riwayat']);

    Route::get('/separator01', [Separator01Controller::class, 'index']);
    Route::post('/separator01', [Separator01Controller::class, 'store']);
    Route::get('/riwayatHMseparator01', [Separator01Controller::class, 'riwayat']);

    Route::get('/separator02', [Separator02Controller::class, 'index']);
    Route::post('/separator02', [Separator02Controller::class, 'store']);
    Route::get('/riwayatHMseparator02', [Separator02Controller::class, 'riwayat']);

    Route::get('/separator03', [Separator03Controller::class, 'index']);
    Route::post('/separator03', [Separator03Controller::class, 'store']);
    Route::get('/riwayatHMseparator03', [Separator03Controller::class, 'riwayat']);

    Route::get('/genset02', [Genset02Controller::class, 'index']);
    Route::post('/genset02', [Genset02Controller::class, 'store']);
    Route::get('/riwayatHMgenset02', [Genset02Controller::class, 'riwayat']);

    Route::get('/turbine01', [Turbine01Controller::class, 'index']);
    Route::post('/turbine01', [Turbine01Controller::class, 'store']);
    Route::get('/riwayatHMturbine01', [Turbine01Controller::class, 'riwayat']);

    Route::get('/turbine02', [Turbine02Controller::class, 'index']);
    Route::post('/turbine02', [Turbine02Controller::class, 'store']);
    Route::get('/riwayatHMturbine02', [Turbine02Controller::class, 'riwayat']);

    Route::get('/presskap20_01', [PressKap20_01Controller::class, 'index']);
    Route::post('/presskap20_01', [PressKap20_01Controller::class, 'store']);
    Route::get('/riwayatHMpresskap20_01', [PressKap20_01Controller::class, 'riwayat']);

    Route::get('/press02', [Press02Controller::class, 'index']);
    Route::post('/press02', [Press02Controller::class, 'store']);
    Route::get('/riwayatHMpress02', [Press02Controller::class, 'riwayat']);

    Route::get('/press03', [Press03Controller::class, 'index']);
    Route::post('/press03', [Press03Controller::class, 'store']);
    Route::get('/riwayatHMpress03', [Press03Controller::class, 'riwayat']);

    Route::get('/press04', [Press04Controller::class, 'index']);
    Route::post('/press04', [Press04Controller::class, 'store']);
    Route::get('/riwayatHMpress04', [Press04Controller::class, 'riwayat']);

    Route::get('/press05', [Press05Controller::class, 'index']);
    Route::post('/press05', [Press05Controller::class, 'store']);
    Route::get('/riwayatHMpress05', [Press05Controller::class, 'riwayat']);

    Route::get('/press06', [Press06Controller::class, 'index']);
    Route::post('/press06', [Press06Controller::class, 'store']);
    Route::get('/riwayatHMpress06', [Press06Controller::class, 'riwayat']);

    Route::get('/hydrocyclone01', [Hydrocyclone01Controller::class, 'index']);
    Route::post('/hydrocyclone01', [Hydrocyclone01Controller::class, 'store']);
    Route::get('/riwayatHMhydrocyclone01', [Hydrocyclone01Controller::class, 'riwayat']);

    Route::get('/ripplemill01', [RippleMill01Controller::class, 'index']);
    Route::post('/ripplemill01', [RippleMill01Controller::class, 'store']);
    Route::get('/riwayatHMripplemill01', [RippleMill01Controller::class, 'riwayat']);

    Route::get('/ripplemill03', [RippleMill03Controller::class, 'index']);
    Route::post('/ripplemill03', [RippleMill03Controller::class, 'store']);
    Route::get('/riwayatHMripplemill03', [RippleMill03Controller::class, 'riwayat']);

    Route::get('/emptybunchpress', [EmptyBunchPressController::class, 'index']);
    Route::post('/emptybunchpress', [EmptyBunchPressController::class, 'store']);
    Route::get('/riwayatHMemptybunchpress', [EmptyBunchPressController::class, 'riwayat']);

    Route::get('/idfanboiler', [IdFanBoilerController::class, 'index']);
    Route::post('/idfanboiler', [IdFanBoilerController::class, 'store']);
    Route::get('/riwayatHMidfanboiler', [IdFanBoilerController::class, 'riwayat']);

    // =========================
    // SERVICE DECANTER 01
    // =========================
    Route::get('/servicedecanter01', [ServiceDecanter01Controller::class, 'index'])
        ->name('servicedecanter01.index');

    Route::post('/servicedecanter01', [ServiceDecanter01Controller::class, 'store'])
        ->name('servicedecanter01.store');

    Route::get('/riwayatSERVICEdecanter01', [ServiceDecanter01Controller::class, 'riwayat'])
        ->name('servicedecanter01.riwayat');

    Route::get('/servicedecanter01/edit/{id}', [ServiceDecanter01Controller::class, 'edit'])
        ->name('service.edit');

    Route::put('/servicedecanter01/update/{id}', [ServiceDecanter01Controller::class, 'update'])
        ->name('service.update');

    Route::delete('/servicedecanter01/{id}', [ServiceDecanter01Controller::class, 'destroy'])
        ->name('service.destroy');
});

/*
|--------------------------------------------------------------------------
| Redirect Root
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});
