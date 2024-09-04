<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function index(): void
    {
        view('index');
    }
}
