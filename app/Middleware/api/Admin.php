<?php

namespace App\Middleware\api;

use App\Controllers\Controller;
use Flight;

class Admin extends Controller
{
    public function before(): void
    {
        if (isset(getallheaders()['Authorization'])) {
            $header_token = getallheaders()['Authorization'];
            if (str_starts_with($header_token, 'Bearer')) {
                $header_token = substr($header_token, 7);
            }
            $db = Flight::db();
            $user_id = $db->prepare('SELECT `user_id` FROM tokens WHERE `token` = :token');
            $user_id->execute([
                ':token' => $header_token,
            ]);
            $user_id = $user_id->fetchAll();
            $user_id = end($user_id)['user_id'];
            $user = $db->prepare('SELECT * FROM users WHERE `id` = :user_id');
            $user->execute([
                ':user_id' => $user_id,
            ]);
            $user = $user->fetchAll();
            $user = end($user);
            if (intval($user['role_id']) !== 1) {
                Flight::redirect("https://editor.salamlang.ir");
                exit();            }
        } else {
            Flight::redirect("https://editor.salamlang.ir");
            exit();
        }
    }
}
