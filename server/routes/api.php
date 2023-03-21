<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')
    ->group(function () {
        Route::controller(AuthController::class)
            ->group(function () {
                Route::post('login', 'login');
                Route::post('logout', 'logout');
                Route::post('refresh', 'refresh');
                Route::post('me', 'me');
            });

        Route::apiResource('category', CategoryController::class)->except(['show']);
    });
