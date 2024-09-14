<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        function getCodeStatsForUser($userId)
        {
            $thirtyDaysAgo = Carbon::now()->subDays(30);

            $data = Code::where('user_id', $userId)
                ->where('created_at', '>=', $thirtyDaysAgo)
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

        $user = auth()->user();

        $code_status_history = getCodeStatsForUser($user['id']);

        return view('dashboard', [
            'code_status_history' => $code_status_history,
        ]);
    }
}
