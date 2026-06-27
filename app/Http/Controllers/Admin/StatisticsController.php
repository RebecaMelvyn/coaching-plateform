<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'sessions' => Session::count(),
        ];

        $registrationsByMonth = collect(range(11, 0))->map(function (int $monthsAgo) {
            $date = now()->subMonths($monthsAgo);

            return [
                'label' => $date->translatedFormat('M Y'),
                'count' => DB::table('session_participants')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        });

        $registrationsByCompany = DB::table('session_participants as sp')
            ->join('coaching_sessions as cs', 'cs.id', '=', 'sp.session_id')
            ->join('companies as c', 'c.id', '=', 'cs.company_id')
            ->select('c.name as company_name', DB::raw('COUNT(*) as total'))
            ->groupBy('c.id', 'c.name')
            ->orderByDesc('total')
            ->get();

        return view('admin.statistics.index', compact(
            'stats',
            'registrationsByMonth',
            'registrationsByCompany',
        ));
    }
}
