<?php

use App\Controllers\AuthController;

Flight::group('/api/v1', function () {
    Flight::route('POST /auth', [new AuthController, 'auth']);
    Flight::route('POST /forgot_password', [new AuthController, 'forgot_password']);
});
