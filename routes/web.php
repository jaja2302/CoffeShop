<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardadminController;
use App\Http\Controllers\Dashboard\DashboardguestController;
use App\Http\Controllers\Auth\AdminAuthController;

// Guest routes
Route::get('/', [DashboardguestController::class, 'index'])->name('dashboard.guest');

// Admin auth routes
Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AdminAuthController::class, 'login']);
});

// Admin protected routes
Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard', [DashboardadminController::class, 'index'])->name('admin.dashboard');
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
