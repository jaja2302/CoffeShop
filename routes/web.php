<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardadminController;
// use App\Http\Controllers\Auth\AdminAuthController;
use App\Livewire\Admin\Adminidashboard;
use App\Livewire\Admin\AdminMenumanagement;
use App\Livewire\Admin\AdminOrders;
use App\Livewire\User\UserDashboard;
use App\Livewire\User\Checkout;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Http\Controllers\Auth\UserAuthController;


Route::get('/', UserDashboard::class)->name('dashboard.user');
// Admin auth routes
Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [AdminAuthController::class, 'login']);
    Route::get('admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('admin/register', [AdminAuthController::class, 'register']);
});

// Admin protected routes
Route::middleware('auth:admin')->group(function () {
    // Route::get('admin/dashboard', Adminidashboard::class)->name('admin.dashboard');
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('admin/menu', AdminMenumanagement::class)->name('admin.menu');
    Route::get('admin/order', AdminOrders::class)->name('admin.order');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [UserAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserAuthController::class, 'login']);
    Route::get('register', [UserAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [UserAuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/checkout', Checkout::class)->name('checkout');
});

