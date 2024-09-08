<?php

namespace App\Controllers;

use App\Trait\BaseApiTrait;
use Firebase\JWT\JWT;

class Controller
{
    use BaseApiTrait;

    public function generateJWT($user, $key): string
    {
        $secret_key = $key;

        $payload = [
            'iss' => env('APP_URL'),
            'aud' => env('APP_URL').'/'.'auth',
            'iat' => time(),
            'exp' => time() + ((3600 * 24) * 30),
            'data' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
            ],
        ];

        $jwt = JWT::encode($payload, $secret_key, 'HS256');

        return $jwt;
    }

    public function generateForgotJWT($email, $key): string
    {
        $secret_key = $key;

        $payload = [
            'iss' => env('APP_URL'),
            'aud' => env('APP_URL').'/'.'auth',
            'iat' => time(),
            'exp' => time() + ((3600 * 24) * 30),
            'data' => [
                'email' => $email
            ],
        ];

        $jwt = JWT::encode($payload, $secret_key, 'HS256');

        return $jwt;
    }
}
