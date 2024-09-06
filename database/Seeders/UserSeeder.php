<?php

namespace Database\Seeders;

class UserSeeder
{
    public static function run($db): void
    {
        $stmt2 = $db->prepare('INSERT INTO roles (title) VALUES (:title)');
        $stmt2->execute([
            ':title' => 'admin',
        ]);

        $stmt3 = $db->prepare('INSERT INTO roles (title) VALUES (:title)');
        $stmt3->execute([
            ':title' => 'user',
        ]);

        $stmt = $db->prepare('INSERT INTO users (name, role_id, email, password) VALUES (:name, :role_id, :email, :password)');
        $stmt->execute([
            ':name' => 'محمد رضا نصراله زاده',
            ':role_id' => 1,
            ':email' => 'mohamadreza1388.org@gmail.com',
            ':password' => password_hash('1A2A3b4b', PASSWORD_DEFAULT),
        ]);
    }
}
