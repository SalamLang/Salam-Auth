<?php

namespace App\Controllers;

use App\Models\Code;
use Flight;
use GeekGroveOfficial\PhpSmartValidator\Validator\Validator;

class CodeController extends Controller
{
    public function visit(): void
    {
        $request = Flight::request()->data->getData();
        $db = Flight::db();
        $code_id = Code::where('slug', $request['slug'])['id'];
        print_r($code_id);
        $stmt = $db->prepare('INSERT INTO `codes_visits`(`code_id`, `user_ip`) VALUES (:code_id, :user_ip)');
        $stmt->execute([
            ':code_id' => $code_id,
            ':user_ip' => Flight::request()->ip,
        ]);

        Flight::json($this->success([
            'message' => ['The visit was registered'],
        ]));
    }

    public function index(): void
    {
        $codes = Code::all();

        view('admin.codes.index', [
            'codes' => $codes,
        ]);
    }

    public function show($id): void
    {
        $code = Code::find($id);

        view('admin.codes.show', [
            'code' => $code,
        ]);
    }

    public function show_code($uuid): void
    {
        $code = Code::where('slug', $uuid);

        if ($code) {
            Flight::json($this->success2([
                'title' => $code['title'],
                'code' => $code['code'],
                'created_at' => $code['created_at'],
            ]));
        } else {
            Flight::json($this->fail2([
                'message' => ['Code notfound.'],
            ], 404));
        }
    }

    public function save(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'title' => ['required'],
            'code' => ['required'],
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = $validator->errors();
        if ($errors) {
            Flight::json($this->fail2(['errors' => $errors]));
        } else {
            $db = Flight::db();
            $stmt = $db->prepare('INSERT INTO `codes`(`slug`, `user_id`, `code`, `title`) VALUES (:slug, :user_id, :code, :title)');
            $uuid = uuid();
            $stmt->execute([
                ':slug' => $uuid,
                ':user_id' => api_user()['id'],
                ':code' => $request['code'],
                ':title' => $request['title'],
            ]);
            Flight::json($this->success2([
                'url' => $uuid,
                'message' => ['Code saved successfully.'],
            ]));
        }
    }
}
