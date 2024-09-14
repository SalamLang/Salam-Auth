<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\CodesVisit;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {


        return view('admin.dashboard', );
    }
}
