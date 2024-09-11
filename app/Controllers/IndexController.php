<?php

namespace App\Controllers;

use Flight;

class IndexController extends Controller
{
    public function index(): void
    {
        dd(FLight::request());
        Flight::redirect('https://editor.salamlang.ir');
    }
}
