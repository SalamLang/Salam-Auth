<?php

use App\Controllers\IndexController;
use Database\Seeders\DatabaseSeeder;

Flight::route("GET /", [new IndexController(), "index"]);

Flight::group("admin", function (){
    Flight::route("GET /", function (){
        echo "ghgfh";
    });
});