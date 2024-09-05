<?php

namespace App\Controllers;

use App\Class\Mail;
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

    public function login(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = ['errors' => $validator->errors()];
        if ($errors['errors']) {
            Flight::json($this->fail($errors, 403), 422);
        } else {
            $email = $request['email'];
            $password = $request['password'];
            $db = Flight::db();
            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute([':email' => $email]);
            $stmt = $stmt->fetchAll();
            $user = end($stmt);
            if (! $user) {
                Flight::json($this->fail([
                    'errors' => [
                        'message' => ['The input information is incorrect.'],
                    ],
                ], 422), 422);
            } else {
                if (password_verify($password, $user['password'])) {
                    date_default_timezone_set('UTC');
                    $today = date('Y-m-d');
                    $tokenCount = $db->prepare('SELECT COUNT(*) as token_count FROM tokens WHERE DATE(created_at) = :today');
                    $tokenCount->execute([
                        ':today' => $today,
                    ]);
                    $tokenCount = $tokenCount->fetchAll();
                    if (intval(end($tokenCount)['token_count']) < 100) {
                        $token = $this->generateJWT($user, 'ijliuyiu');
                        $stmt2 = $db->prepare('INSERT INTO `tokens` (`token`, `user_id`) VALUES (:token, :user_id)');
                        $stmt2->execute([
                            ':token' => $token,
                            ':user_id' => $user['id'],
                        ]);
                        Flight::json($this->success([
                            'today_count' => end($tokenCount)['token_count'],
                            'token' => $token,
                        ]));
                    } else {
                        Flight::json($this->fail([
                            'errors' => [
                                'token' => ['You have generated the maximum number of tokens. You cannot generate another token for 24 hours'],
                            ],
                        ], 403), 403);
                    }
                } else {
                    Flight::json($this->fail([
                        'errors' => [
                            'message' => ['The input information is incorrect.'],
                        ],
                    ], 422), 422);
                }
            }
        }
    }

    public function forgot_send_email(): void
    {
        $request = Flight::request()->data->getData();
        $rules = [
            'email' => ['required', 'email'],
        ];
        $validator = new Validator($request, $rules);
        $validator->validate();
        $errors = ['errors' => $validator->errors()];
        if (! $errors['errors']) {
            $db = Flight::db();
            $stmt = $db->prepare('select * from users where email = :email');
            $stmt->execute([':email' => $request['email']]);
            $result = $stmt->fetchAll();
            $result = end($result);
            if ($result) {
                if (
                    Mail::send(
                        view('email.forgot', [["url" => "/", "name" => $result["name"]]], true),
                        $result['email'],
                        'Forgot email',
                        'Forgot password')
                ) {
                    Flight::json($this->success([
                        'message' => ['Email send success.'],
                    ]));
                } else {
                    Flight::json($this->fail([
                        'errors' => [
                            'message' => ['Failed to send email.'],
                        ],
                    ], 424), 424);
                }
            } else {
                Flight::json($this->success([
                    'message' => ['Email send success.'],
                ]));
            }
        } else {
            Flight::json($this->fail($errors, 422), 422);
        }
    }
}
