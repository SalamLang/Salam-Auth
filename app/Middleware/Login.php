<?php

namespace App\Middleware;

use App\Controllers\Controller;
use Flight;

class Login extends Controller
{
    public function before(): void
    {
        if (isset(getallheaders()['Authorization'])) {
            $header_token = getallheaders()['Authorization'];
            if (str_starts_with($header_token, 'Bearer')) {
                $header_token = substr($header_token, 7);
            }
            $db = Flight::db();
            $tokenCount = $db->prepare('SELECT COUNT(*) as token_count FROM tokens WHERE `token` = :token');
            $tokenCount->execute([
                ':token' => $header_token,
            ]);
            $result = $tokenCount->fetchAll();
            $result = end($result)['token_count'];
            if (intval($result) === 0) {
                Flight::jsonHalt($this->success([
                    'message' => ['Unauthorized'],
                ], '401'), 401);
            }
        } else {
            Flight::jsonHalt($this->success([
                'message' => ['Unauthorized'],
            ], '401'), 401);
        }
    }
}
