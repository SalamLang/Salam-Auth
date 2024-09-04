<?php

namespace Database\Seeders;

use Flight;

class UserSeeder
{
    public static function run($db): void
    {
        $db = Flight::db();
        $stmt = $db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $stmt->execute([
            ':name' => 'mohamadreza nasralezade',
            ':email' => 'mohamadreza1388.org@gmail.com',
            ':password' => password_hash('1A2A3b4b', PASSWORD_DEFAULT),
        ]);
    }
}
