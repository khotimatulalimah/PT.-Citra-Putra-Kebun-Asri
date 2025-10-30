<?php

use Illuminate\Support\Facades\Route;


Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::get('/HM', function () {
    return view('HM');
});

Route::get('/', function () {
    return view('welcome');
});
