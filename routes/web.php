<?php

global $route;


use Database\Seeders\DatabaseSeeder;

$route->get("/", function (){
   DatabaseSeeder::run();
});