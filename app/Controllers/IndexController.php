<?php

namespace App\Controllers;

use Flight;

class IndexController extends Controller
{
    public function index(): void
    {
        Flight::redirect("https://salamlang.ir");
    }
}
