<?php

namespace App\Middleware\mvc;

use App\Controllers\Controller;
use Flight;

class Login extends Controller
{
    public function before(): void
    {
        if (isset($_COOKIE['token'])) {
            dd("ijj");
        } else {
            dd("ijj");
        }
    }
}
