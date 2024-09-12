<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AuthController extends Controller
{
    public function auth(): View|Factory|Application
    {
        return view('auth.auth');
    }

    public function check_auth(AuthRequest $authRequest): RedirectResponse|Redirector|Application
    {
        $email = $authRequest->all()['email'];

        $user = User::where('email', $email)?->first();

        if ($user) {
            return redirect(route('login'));
        } else {
            return redirect(route('register'));
        }
    }
}
