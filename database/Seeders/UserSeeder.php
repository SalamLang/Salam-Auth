<?php

namespace Database\Seeders;

use Flight;

class UserSeeder
{
    public static function run($db): void
    {
        $db = Flight::db();

        $users = [
            ['name' => 'User1', 'email' => 'user1@example.com', 'password' => password_hash('password1', PASSWORD_BCRYPT)],
            ['name' => 'User2', 'email' => 'user2@example.com', 'password' => password_hash('password2', PASSWORD_BCRYPT)],
            ['name' => 'User3', 'email' => 'user3@example.com', 'password' => password_hash('password3', PASSWORD_BCRYPT)],
            ['name' => 'User4', 'email' => 'user4@example.com', 'password' => password_hash('password4', PASSWORD_BCRYPT)],
            ['name' => 'User5', 'email' => 'user5@example.com', 'password' => password_hash('password5', PASSWORD_BCRYPT)],
            ['name' => 'User6', 'email' => 'user6@example.com', 'password' => password_hash('password6', PASSWORD_BCRYPT)],
            ['name' => 'User7', 'email' => 'user7@example.com', 'password' => password_hash('password7', PASSWORD_BCRYPT)],
            ['name' => 'User8', 'email' => 'user8@example.com', 'password' => password_hash('password8', PASSWORD_BCRYPT)],
            ['name' => 'User9', 'email' => 'user9@example.com', 'password' => password_hash('password9', PASSWORD_BCRYPT)],
            ['name' => 'User10', 'email' => 'user10@example.com', 'password' => password_hash('password10', PASSWORD_BCRYPT)],
        ];

        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

        foreach ($users as $user) {
            $stmt->execute([
                ':name' => $user['name'],
                ':email' => $user['email'],
                ':password' => $user['password']
            ]);
        }

        echo "10 users inserted successfully!";
    }
}
