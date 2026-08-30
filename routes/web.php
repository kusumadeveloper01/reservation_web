<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\CustomerLoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Customer Auth
Route::get('/login', [CustomerLoginController::class, 'create'])->name('login');
Route::post('/login', [CustomerLoginController::class, 'store'])->name('login.store');
Route::post('/logout', [CustomerLoginController::class, 'logout'])->name('logout');

// Only Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])->name('dashboard');
});

// Admin Login Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
});

require __DIR__ . '/auth.php';
