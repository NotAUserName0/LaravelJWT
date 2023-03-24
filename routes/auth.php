<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::post('/login', 'App\Http\Controllers\Controller@login');

Route::get('/index', 'App\Http\Controllers\Controller@index');


Route::get('/register', function () {
    return "register";
});
