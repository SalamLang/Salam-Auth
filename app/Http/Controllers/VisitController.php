<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        Visit::create([
            "user_ip" => $request->ip(),
            "user_agent" => $request->userAgent(),
        ]);
    }
}
