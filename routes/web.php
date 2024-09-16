<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController as UserDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CodeController;
use Illuminate\Support\Facades\Mail;
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
            Route::resource('codes', CodeController::class);
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

Route::get('/send-email', function () {
    $to_email = 'recipient@example.com'; // آدرس ایمیل مقصد
    $subject = 'Test Email Subject'; // موضوع ایمیل
    $message = 'This is a test email without using a view.'; // متن ایمیل

    Mail::raw($message, function ($mail) use ($to_email, $subject) {
        $mail->to($to_email)
            ->subject($subject);
    });

    return 'Email Sent';
});
