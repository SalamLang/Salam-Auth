<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\CodesVisit;
use App\Models\Email;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $best_code_visit = DB::table('codes_visits')
            ->select('code_id', DB::raw('COUNT(*) as count'))
            ->groupBy('code_id')
            ->orderBy('count', 'DESC')
            ->limit(10)
            ->get();

        $best_code_results = Code::whereIn("id", $best_code_visit->pluck('code_id')->toArray())->get();

        return view('admin.dashboard', [
            'users_history' => $users_history,
            'codes_history' => $codes_history,
            'codes_visits_history' => $codes_visits_history,
            'emails_history' => $emails_history,
            "best_code_results" => $best_code_results
        ]);
    }
}
