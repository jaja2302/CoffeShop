<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardadminController;
use App\Http\Controllers\Dashboard\DashboardguestController;

Route::get('/', function () {
    return redirect()->route('dashboard.guest');
});

Route::get('/dashboard/guest', [DashboardguestController::class, 'index'])->name('dashboard.guest');
Route::get('/dashboard/admin', [DashboardadminController::class, 'index'])->name('dashboard.admin');
