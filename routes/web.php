<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardadminController;
use App\Http\Controllers\Dashboard\DashboardguestController;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/', function () {
    return redirect()->route('dashboard.guest');
});

// Guest routes
Route::get('/', [DashboardguestController::class, 'index'])->name('dashboard.guest');

// Admin auth routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
        Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AdminAuthController::class, 'register']);
    });
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

// Admin protected routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
    Route::get('/admin', [DashboardadminController::class, 'index'])->name('dashboard.admin');
});
