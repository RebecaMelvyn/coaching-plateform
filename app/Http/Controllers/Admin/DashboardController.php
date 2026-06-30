<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'coaches' => User::where('role', 'coach')->count(),
            'employees' => User::whereIn('role', ['employee', 'employé'])->count(),
            'companies' => Company::count(),
            'sessions' => Session::count(),
            'registrations' => DB::table('session_participants')->count(),
        ];

        $trends = [
            'users' => $this->monthTrend(User::query()),
            'coaches' => $this->monthTrend(User::query()->where('role', 'coach')),
            'employees' => $this->monthTrend(User::query()->whereIn('role', ['employee', 'employé'])),
            'companies' => $this->monthTrend(Company::query()),
            'sessions' => $this->monthTrend(Session::query()),
            'registrations' => $this->monthTrend(DB::table('session_participants')),
        ];

        $recentSessions = Session::query()
            ->with(['coach', 'company'])
            ->withCount('participants')
            ->latest('start_time')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'trends', 'recentSessions'));
    }

    private function monthTrend($query): string
    {
        $builder = clone $query;

        $count = $builder
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        return $count > 0 ? "+{$count} ce mois" : '0 ce mois';
    }
}
