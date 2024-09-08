<?php

namespace App\Controllers\admin\users;

use App\Controllers\Controller;
use App\Models\User;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

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
        view('admin.users.edit', ['user' => $user]);
    }

    public function update(): void
    {
        $request = Flight::request()->data->getData();
        $rules = ['email' => ['required', 'email'], 'name' => ['required', 'min:2'], 'role_id' => ['required', 'string']];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = $validator->errors();
        if ($errors) {
            Flight::redirect(Flight::request()->referrer);
        } else {
            $db = Flight::db();
            $stmt = $db->prepare('UPDATE `users` SET `name` = :name, `email` = :email, `role_id`= :role_id WHERE id = :id');
            $stmt->execute([':name' => $request['name'], ':email' => $request['email'], ':role_id' => $request['role_id'], ':id' => $request['id']]);
            Flight::redirect(route('users.index'));
        }
    }
}
