<?php

namespace App\Controllers;

use App\Models\Number;
use Flight;

class NumberController extends Controller
{
    public function new_password(): void
    {
        $request = Flight::request()->data->getData();
        $number = Number::where('number', $request["number"]);

        if (!$number) {
            $request = Flight::request()->data->getData();
            $db = Flight::db();
            $stmt = $db->prepare('INSERT INTO `numbers`(`number`) VALUES (:number)');
            $stmt->execute([
                ':number' => $request['number'],
            ]);
            Flight::json([
                'message' => ['شماره تلفن با موفقیت ثبت شد.'],
            ]);
        } else {
            Flight::json([
                'message' => ['شماره از قبل وجود دارد.'],
            ]);
        }
    }
}
