<?php

use Illuminate\Support\Facades\Route;

Route::get('/registerview', function () {
    return view('/auth/register');
});


