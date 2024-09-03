<?php

namespace App\Controllers;

use App\Models\User;

class IndexController extends Controller
{
    public function index(): void
    {
        $users = User::all();
        view("test", ["users" => $users]);
    }
}
