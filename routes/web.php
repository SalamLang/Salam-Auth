<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController as UserDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\Codes\CodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Login Middleware
Route::middleware('auth')->group(function () {
    //Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    //Email Verify Middleware
    Route::middleware('verified')->group(function () {
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');
            Route::prefix("codes")->group(function () {
                Route::get('/', [CodeController::class, 'index'])->name('codes');
                Route::delete('/', [CodeController::class, 'destroy'])->name('codes.destroy');
            });
        });

        //Admin Allowed Route Middleware
        Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        });
    });
});

//Guest Middleware
Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
    Route::post('/auth', [AuthController::class, 'check_auth'])->name('auth');
});

//Breeze Auth System Routes
require __DIR__.'/auth.php';
