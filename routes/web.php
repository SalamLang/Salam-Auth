<?php

use App\Class\Route;
use App\Controllers\admin\HomeController;
use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Middleware\mvc\Admin;
use App\Middleware\mvc\Login;

$APP_URL = env('APP_URL');

Route::lists([
    'auth' => $APP_URL.'/'.'auth',
    'index' => $APP_URL,
    'admin.home' => $APP_URL.'/'.'admin',
]);

//login and register(auth):
Flight::route('GET /auth', [new AuthController, 'index']);

//index page and home
Flight::route('GET /', [new IndexController, 'index']);

Flight::group('/', function () {
    Flight::group('admin', function () {
        Flight::route('GET /', [new HomeController, 'index']);
    }, [new Admin]);
}, [new Login]);
