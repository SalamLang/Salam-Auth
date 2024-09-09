<?php

namespace App\Controllers;

use App\Models\Number;
use Flight;

class NumberController extends Controller
{
    public function new_password($num): void {
        $number = Number::where('number', $num);
        if($number){
            $request = Flight::request()->data->getData();
            $db = Flight::db();
            $stmt = $db->prepare("INSERT INTO `numbers`(`number`) VALUES (:number)");
            $stmt->execute([
                "number" => $request["number"]
            ]);
            Flight::json([
                "message" => ["The phone number has been successfully registered."]
            ]);
        }else {
            Flight::json([
                "message" => ["The number is already registered."]
            ]);
        }
    }
}
