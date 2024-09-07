<?php

namespace App\Controllers;

use App\Class\Mail;
use App\Models\Code;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class CodeController extends Controller
{
    public function visit(): void
    {
        $request = Flight::request()->data->getData();
        $db = Flight::db();
        $code_id = Code::where("slug", $request["slug"])["id"];
        print_r($code_id);
        $stmt = $db->prepare('INSERT INTO `codes_visits`(`code_id`, `user_ip`) VALUES (:code_id, :user_ip)');
        $stmt->execute([
           ':code_id' => $code_id,
           ':user_ip' => Flight::request()->ip
        ]);

        Flight::json($this->success([
            "message" => ["The visit was registered"]
        ]));
    }
}
