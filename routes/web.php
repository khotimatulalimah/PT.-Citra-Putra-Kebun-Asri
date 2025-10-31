<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Decanter01Controller;

Route::get('/Decanter01', [Decanter01Controller::class, 'index']);
Route::post('/Decanter01', [Decanter01Controller::class, 'store']);


Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::get('/HM', function () {
    return view('HM');
});

Route::get('/RiwayatHM', function () {
    return view('RiwayatHM');
});

Route::get('/', function () {
    return view('welcome');
});
