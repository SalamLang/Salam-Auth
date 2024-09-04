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
             $stmt = $db->prepare('');
             $stmt->execute();
             $result = $stmt->fetchAll();


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
}
