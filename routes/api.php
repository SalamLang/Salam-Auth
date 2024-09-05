<?php

use App\Controllers\AuthController;

Flight::group('/api/v1', function () {
    Flight::route('POST /auth', [new AuthController, 'auth']);
    Flight::route('POST /forgot_send_email', [new AuthController, 'forgot_send_email']);

    Flight::route('POST /login', [new AuthController, 'login']);
});
