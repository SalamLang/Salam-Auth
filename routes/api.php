<?php

use App\Controllers\AuthController;
use App\Middleware\Login;

Flight::group('/api/v1', function () {
    Flight::route('POST /auth', [new AuthController, 'auth']);
    Flight::route('POST /forgot_send_email', [new AuthController, 'forgot_send_email']);
    Flight::route('POST /login', [new AuthController, 'login']);
    Flight::route('POST /register', [new AuthController, 'register']);
    Flight::route('POST /test', function () {
        echo "hi";
    })->addMiddleware([new Login()]);
});
