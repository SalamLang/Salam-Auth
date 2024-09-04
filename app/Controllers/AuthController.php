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
        $errors = $validator->errors();
        Flight::json($errors);
    }
}
