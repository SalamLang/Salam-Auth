<?php

namespace App\Controllers;

use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class AuthController extends Controller
{
    public function index(): void
    {
        view('auth.index');
    }

    public function auth(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'email' => ['required', 'email'],
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = ['errors' => $validator->errors()];
        if ($errors['errors']) {
            Flight::json($this->fail($errors, 403, 'Fail'), 422);
        } else {
            $db = Flight::db();
            $stmt = $db->prepare('select COUNT(*) as count from users where email = :email');
            $stmt->execute([':email' => $request['email']]);
            $result = $stmt->fetchAll();
            $result = end($result)['count'];
            if ($result > 0) {
                $data = [
                    'status' => 'login',
                ];
                Flight::json($this->success($data));
            } else {
                $data = [
                    'status' => 'register',
                ];
                Flight::json($this->success($data));
            }

        }
    }

    public function forgot_password(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'email' => ['required', 'email'],
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = ['errors' => $validator->errors()];
        if ($errors['errors']) {
            Flight::json($this->fail($errors, 403, 'Fail'), 422);
        } else {
            Flight::json($this->success(), 200);
        }
    }

    public function login(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required','min:8']
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = ['errors' => $validator->errors()];
        if ($errors['errors']) {
            Flight::json($this->fail($errors, 403), 422);
        } else {
            Flight::json($this->success());
        }
    }
}
