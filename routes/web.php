<?php

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/filter', [ReportController::class, 'filter'])->name('reports.filter');
        
        Route::post('/logout', function () {
            Auth::guard('admin')->logout();
            return redirect()->route('login');
        })->name('admin.logout');
    });
});
