<?php

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'apiLogin']);

    Route::middleware('auth:admin-api')->group(function () {
        Route::post('/logout', [AuthController::class, 'apiLogout']);
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::get('/refresh', [AuthController::class, 'refresh']);
    });
});
