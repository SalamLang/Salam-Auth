<?php

namespace App\Http\Controllers;

use App\DataTables\User\CodeDataTable;
use App\Models\Code;
use App\Models\CodesVisit;
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

        function getVisitForUser($userId)
        {
            $thirtyDaysAgo = Carbon::now()->subDays(30);

            $codes = $userId->codes()->get()->pluck('id');

            $data = CodesVisit::whereIn('code_id', $codes)
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

        $code_codes_visits = getVisitForUser($user);

        $last_codes = $user->codes()->orderBy('id', 'desc')->limit(10)->get();

        return view('user.dashboard', [
            'code_status_history' => $code_status_history,
            'code_codes_visits' => $code_codes_visits,
            'last_codes' => $last_codes,
        ]);
    }

    public function codes(CodeDataTable $dataTable)
    {
        return $dataTable->render('user.codes');
    }
}
