<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});

Route::post('/register',function () {
    return 'Thank You for Registration';
});