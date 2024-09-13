<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController as UserDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserDashboard::class])->middleware()->name('dashboard');

//Login Middleware
Route::middleware('auth')->group(function () {
    //Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Email Verify Middleware
    Route::middleware('verified')->group(function () {

    });

    //Admin Allowed Route Middleware
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin_dashboard');
        })->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');
    });
});

//Guest Middleware
Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('/auth', [AuthController::class, 'check_auth'])->name('auth');
});

//Breeze Auth System Routes
require __DIR__.'/auth.php';
