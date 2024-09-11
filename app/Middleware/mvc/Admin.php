<?php

namespace App\Middleware\mvc;

use App\Controllers\Controller;
use Flight;

class Admin extends Controller
{
    public function before(): void
    {
        if (isset($_COOKIE['token'])) {
            $header_token = $_COOKIE['token'];
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
            }
        } else {
            Flight::redirect("https://editor.salamlang.ir");
        }
    }
}
