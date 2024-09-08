<?php

use App\Class\Route;
use App\Controllers\admin\HomeController;
use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Middleware\api\Forgot;
use App\Middleware\mvc\Admin;
use App\Middleware\mvc\Login;
use App\Models\Setting;

$APP_URL = env('APP_URL');

Route::lists([
    'auth' => $APP_URL.'/'.'auth',
    'index' => $APP_URL,
    'admin.home' => $APP_URL.'/'.'admin',
]);

Flight::route('GET /auth', [new AuthController, 'index']);

Flight::route('GET /new_password', [new AuthController, 'forgot_view']);

Flight::route('GET /', [new IndexController, 'index']);

Flight::group('/', function () {
    Flight::group('admin', function () {
        Flight::route('GET /', [new HomeController, 'index']);
    }, [new Admin]);
}, [new Login]);
