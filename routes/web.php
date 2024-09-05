<?php

use App\Controllers\AuthController;
use App\Controllers\IndexController;

//login and register(auth):
Flight::route('GET /auth', [new AuthController, 'index']);

//index page and home
Flight::route('GET /', [new IndexController, 'index']);

Flight::route('GET /test', function (){
    view("email.forgot");
});
