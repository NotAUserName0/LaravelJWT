<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'App\Http\Controllers\Controller@login');


Route::get('/register', function () {
    return "register";
});
