<?php

use App\Http\Controllers\ComplimentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [LoginController::class, "authenticate"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('tags', TagController::class)
        ->only([
            'index',
            'store',
            'show'
        ]);

    Route::resource('users', UserController::class)
        ->only([
            'index',
            'store',
            'show'
        ]);

    Route::resource('compliments', ComplimentController::class)
        ->only([
            'index',
            'store',
            'show'
        ]);
});
