<?php

use App\Http\Controllers\API\ArtController;
use App\Http\Controllers\API\LableController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//auth route
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
    });
});

//public routes
Route::apiResource('arts', ArtController::class)->only(['index', 'show']);
Route::apiResource('lables', LableController::class)->only(['index', 'show']);

//private routes
Route::middleware('auth:sanctum')->group(function () {

        //customer
        Route::apiResource('arts', ArtController::class, ['store', 'update', 'destroy']);

        //admin
        Route::apiResource('tags', TagController::class);
        Route::apiResource('lables', LableController::class, ['store', 'update', 'destroy']);
});

Route::fallback(function () {
    return '404';
});

