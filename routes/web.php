<?php

use App\Class\Route;
use App\Controllers\admin\HomeController;
use App\Controllers\admin\users\UserController;
use App\Controllers\AuthController;
use App\Controllers\CodeController;
use App\Controllers\IndexController;
use App\Middleware\mvc\Admin;
use App\Middleware\mvc\Login;

$APP_URL = "https://admin.salamlang.ir";

Route::lists([
    'auth' => $APP_URL.'/'.'auth',
    'index' => $APP_URL,
    'admin.home' => $APP_URL.'/',
    'new_password' => $APP_URL.'/'.'new_password',
    'users.index' => $APP_URL.'/'.'users',
    'codes.index' => $APP_URL.'/'.'codes',
]);

if (FLight::request()->host !== "admin.salamlang.ir"){
    Flight::route('GET /auth', [new AuthController, 'index']);

    Flight::route('GET /new_password(/@token)', [new AuthController, 'forgot_view']);

    Flight::route('GET /', [new IndexController, 'index']);
}

if (FLight::request()->host === "admin.salamlang.ir"){
    Flight::group('/', function () {

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
}



