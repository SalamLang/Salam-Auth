<?php

global $route;


use App\Controllers\IndexController;
use Database\Seeders\DatabaseSeeder;

$route->get("/", [new IndexController(), "index"]);