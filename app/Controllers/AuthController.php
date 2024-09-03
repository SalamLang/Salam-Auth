<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function index(): void
    {
        view("auth.index");
    }
}
