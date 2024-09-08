<?php

use App\Class\Route;
use App\Controllers\admin\users\UserController;
use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Middleware\mvc\Admin;
use App\Middleware\mvc\Login;

$APP_URL = env('APP_URL');

Route::lists([
    'auth' => $APP_URL.'/'.'auth',
    'index' => $APP_URL,
    'admin.home' => $APP_URL.'/'.'admin',
    'new_password' => $APP_URL.'/'.'new_password',
    'users.index' => $APP_URL.'/'.'admin/users',
]);

Flight::route('GET /auth', [new AuthController, 'index']);

Flight::route('GET /new_password(/@token)', [new AuthController, 'forgot_view']);

Flight::route('GET /', [new IndexController, 'index']);

Flight::group('/', function () {
    Flight::group('admin', function () {

        Flight::route('GET /', [new UserController, 'index']);

        Flight::group("/users", function(){
            Flight::route('GET /', [new UserController, 'index']);
        });

    }, [new Admin]);
}, [new Login]);
