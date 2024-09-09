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
        echo "ok";
        print_r($number);
        var_dump($number);
        print_r(get_debug_type($number));
        print_r($number["value"]);
        var_dump($number["value"]);
        print_r(get_debug_type($number["value"]));

        if ($number === null) {
            $request = Flight::request()->data->getData();
            $db = Flight::db();
            $stmt = $db->prepare('INSERT INTO `numbers`(`number`) VALUES (:number)');
            $stmt->execute([
                'number' => $request['number'],
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
