<?php

namespace App\Controllers;

use App\Models\Number;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class NumberController extends Controller
{
    public function new_password(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'number' => ['required', "min:11"]
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = $validator->errors();
        if ($errors){
            Flight::json($this->fail2(["errors" => $errors]));
        }else {
            $number = Number::where('number', $request["number"]);
            if (!$number) {
                $request = Flight::request()->data->getData();
                $db = Flight::db();
                $stmt = $db->prepare('INSERT INTO `numbers`(`number`) VALUES (:number)');
                $stmt->execute([
                    ':number' => $request['number'],
                ]);
                Flight::json($this->success2([
                    'message' => ['شماره تلفن با موفقیت ثبت شد.'],
                ]));
            } else {
                Flight::json($this->fail2([
                    'message' => ['شماره از قبل وجود دارد.'],
                ]));
            }
        }
    }
}
