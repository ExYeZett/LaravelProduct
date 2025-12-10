<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Public/auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);

// Protected routes (require login)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(\App\Http\Middleware\AuthCheck::class);

Route::resource('products', ProductController::class)->middleware(\App\Http\Middleware\AuthCheck::class);

// root can redirect to dashboard (protected)
Route::get('/', function () {
    return redirect('/dashboard');
});
