<?php

namespace App\Controllers\admin\users;

use App\Controllers\Controller;

class UserController extends Controller
{
    public function index(): void
    {
        view("admin.users.index");
    }
}
