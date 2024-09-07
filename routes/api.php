<?php

use App\Controllers\AuthController;

Flight::group('/api/v1', function () {
    Flight::route('POST /auth', [new AuthController, 'auth']);
    Flight::route('POST /forgot_send_email', [new AuthController, 'forgot_send_email']);
    Flight::route('POST /login', [new AuthController, 'login']);
    Flight::route('POST /register', [new AuthController, 'register']);
    Flight::route('POST /test', function () {
        $db = Flight::db();
        $request = Flight::request()->data->getData();
        $token = $request["token"];
        $tokenCount = $db->prepare('SELECT COUNT(*) as token_count FROM tokens WHERE `token` = :token');
        $tokenCount->execute([
            ':token' => $token,
        ]);
        $result = $tokenCount->fetchAll();
        print_r($result);
    });
});
