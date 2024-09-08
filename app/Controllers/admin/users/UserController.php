<?php

namespace App\Controllers\admin\users;

use App\Controllers\Controller;
use App\Models\User;
use Flight;

class UserController extends Controller
{
    public function index(): void
    {
        $users = chunck_data("users");



        view("admin.users.index", [
            "users" => $users
        ]);
    }
}
