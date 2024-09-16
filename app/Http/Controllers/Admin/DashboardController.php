<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\CodesVisit;
use App\Models\Email;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        function GetTables($day, $model)
        {
            $data = $model::where('created_at', '>=', Carbon::now()->subDays($day))
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get();

            $dates = $data->pluck('date')->toArray();
            $totals = $data->pluck('total')->toArray();

            return [
                'dates' => $dates,
                'totals' => $totals,
            ];
        }

        $users_history = GetTables(10, User::class);
        $codes_history = GetTables(10, Code::class);
        $codes_visits_history = GetTables(10, CodesVisit::class);
        $emails_history = GetTables(10, Email::class);

        return view('admin.dashboard', [
            'users_history' => $users_history,
            'codes_history' => $codes_history,
            'codes_visits_history' => $codes_visits_history,
            'emails_history' => $emails_history
        ]);
    }
}
