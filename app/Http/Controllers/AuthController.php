<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AuthController extends Controller
{
    public function auth(): View|Factory|Application
    {
        return view('auth.auth');
    }
}
