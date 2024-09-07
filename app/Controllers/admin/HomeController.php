<?php

namespace App\Controllers\admin;

use App\Class\Route;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        view("admin.home");
    }
}
