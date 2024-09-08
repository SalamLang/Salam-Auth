<?php

namespace App\Controllers\admin\users;

use App\Controllers\Controller;
use App\Models\User;
use Flight;

class UserController extends Controller
{
    public function index(): void
    {
        $users = chunck_data('users');

        view('admin.users.index', ['users' => $users]);
    }

    public function destroy($id): void
    {
        $db = Flight::db();
        $stmt = $db->prepare('DELETE FROM `users` WHERE id = :id');
        $stmt->execute([':id' => $id]);

        Flight::redirect(Flight::request()->referrer);
    }

    public function edit($id): void
    {
        $user = User::find($id);
        view("admin.users.edit", [
            "user" => $user
        ]);
    }

    public function update(): void
    {
        $request = Flight::request()->data->getData();

    }


}
