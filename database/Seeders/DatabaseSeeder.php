<?php

namespace Database\Seeders;

use Flight;

class DatabaseSeeder
{
    public static function run(): void
    {
        $db = Flight::db();
        //Seeders
        UserSeeder::run($db);

        echo "\033[94mSeeders run.\033[0m";
    }
}
