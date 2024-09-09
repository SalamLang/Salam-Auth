<?php

use App\Controllers\AuthController;
use App\Controllers\CodeController;
use App\Controllers\NumberController;
use App\Middleware\api\Login;

Flight::group('/api/v1', function () {
    Flight::route('POST /auth', [new AuthController, 'auth']);
    Flight::route('POST /forgot_send_email', [new AuthController, 'forgot_send_email']);
    Flight::route('POST /login', [new AuthController, 'login']);
    Flight::route('POST /register', [new AuthController, 'register']);
    Flight::route('POST /code_visit', [new CodeController, 'visit']);
    Flight::route('POST /change_pass', [new AuthController, 'change_pass']);
    Flight::route('POST /number', [new NumberController, 'new_password']);
    Flight::group("/codes", function(){
        Flight::route("POST /save", [new CodeController(), "save"]);
    }, [new Login()]);
});
