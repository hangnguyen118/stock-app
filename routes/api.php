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
Route::prefix('auth')->name('auth')->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(LogoutController::class)->group(function (){
            Route::get('logout', 'logout')->name('.logout');
        });
    });
});

//public routes
Route::apiResource('arts', ArtController::class, ['index', 'show']);

//private routes
Route::middleware('auth:sanctum')->group(function () {
    Route::name('customer.')->group(function() {
        Route::apiResource('arts', ArtController::class, ['store', 'update', 'destroy']);
    });
    Route::name('admin.')->group(function(){
        Route::apiResource('tags', TagController::class);
        Route::apiResource('lables', LableController::class);
    });
});

Route::fallback(function () {
    return '404';
});

