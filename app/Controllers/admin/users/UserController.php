<?php

namespace App\Controllers\admin\users;

use App\Controllers\Controller;
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
}
