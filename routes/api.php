<?php

use App\Http\Controllers\API\ArtController;
use App\Http\Controllers\API\FavouritesController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\LableController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

//private routes
Route::middleware('auth:sanctum')->group(function () {

        //customer
        Route::apiResource('arts', ArtController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
        Route::apiResource('galleries', GalleryController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
        Route::post('arts/{art}/favourites', [FavouritesController::class, 'favouriteArt']);
        Route::delete('arts/{art}/favourites', [FavouritesController::class, 'unFavouriteArt']);
        
        //admin
        Route::apiResource('tags', TagController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('lables', LableController::class)->only(['store', 'update', 'destroy']);
});

Route::fallback(function () {
    return '404';
});

