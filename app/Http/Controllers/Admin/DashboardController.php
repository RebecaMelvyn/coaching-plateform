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

        $latestSessions = Session::query()
            ->with(['coach', 'company'])
            ->latest()
            ->limit(5)
            ->get();

        $latestUsers = User::query()
            ->with('company')
            ->latest()
            ->limit(5)
            ->get();

        $latestRegistrations = DB::table('session_participants as sp')
            ->join('users as u', 'u.id', '=', 'sp.user_id')
            ->join('coaching_sessions as cs', 'cs.id', '=', 'sp.session_id')
            ->select(
                'sp.id',
                'sp.created_at',
                'u.name as user_name',
                'u.email as user_email',
                'cs.title as session_title',
                'cs.start_time as session_start_time',
            )
            ->orderByDesc('sp.created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'latestSessions',
            'latestUsers',
            'latestRegistrations',
        ));
    }
}
