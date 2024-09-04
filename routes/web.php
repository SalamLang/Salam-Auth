<?php

use App\Controllers\AuthController;
use App\Controllers\IndexController;
use Database\Seeders\DatabaseSeeder;

//login and register(auth):
Flight::route("GET /auth", [new AuthController(), "index"]);

//index page and home
Flight::route("GET /", [new IndexController(), "index"]);