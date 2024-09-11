<?php

use App\Class\Route;
use App\Controllers\admin\HomeController;
use App\Controllers\admin\users\UserController;
use App\Controllers\AuthController;
use App\Controllers\CodeController;
use App\Controllers\IndexController;
use App\Middleware\mvc\Admin;
use App\Middleware\mvc\Login;

$APP_URL = "https://auth.salamlang.ir";

Route::lists([
    'auth' => $APP_URL.'/'.'auth',
    'index' => $APP_URL,
    'new_password' => $APP_URL.'/'.'new_password',
    'admin.home' => $APP_URL.'/admin/',
    'users.index' => $APP_URL.'/admin/'.'users',
    'codes.index' => $APP_URL.'/admin/'.'codes',
]);

if (substr(FLight::request()->host, 0, 18) === "auth.salamlang.ir"){
    Flight::group('/admin', function () {
            Flight::route('GET /', [new HomeController, 'index']);

            Flight::group('/users', function () {
                Flight::route('GET /', [new UserController, 'index']);
                Flight::route('GET /delete/@id', [new UserController, 'destroy']);
                Flight::route('GET /edit/@id', [new UserController, 'edit']);
                Flight::route('POST /update', [new UserController, 'update']);
            });

            Flight::group('/codes', function () {
                Flight::route('GET /', [new CodeController, 'index']);
                Flight::route('GET /show/@id', [new CodeController, 'show']);
            });

    }, [new Login, new Admin]);

    Flight::route('GET /auth', [new AuthController, 'index']);

    Flight::route('GET /new_password(/@token)', [new AuthController, 'forgot_view']);

    Flight::route('GET /', [new IndexController, 'index']);
}



