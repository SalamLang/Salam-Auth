<?php

namespace App\Middleware\mvc;

use App\Controllers\Controller;
use Flight;

class Login extends Controller
{
    public function before(): void
    {
        if (array_key_exists('token', $_COOKIE)) {
            dd("Token exists: " . $_COOKIE['token']);
        } else {
            dd("Token not set.");
        }
    }
}
