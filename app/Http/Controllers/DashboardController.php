<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $now = \Carbon\Carbon::now();

        if ($user->role === 'coach') {
            $nextSessions = \App\Models\Session::where('coach_id', $user->id)
                ->where('start_time', '>=', $now)
                ->orderBy('start_time')
                ->withCount('participants')
                ->get();
            $upcomingSessions = $nextSessions->count();
            $totalParticipants = $nextSessions->sum(function($session) { return $session->participants->count(); });
            $partnerCompanies = $nextSessions->pluck('company_id')->unique()->count();
            return view('dashboard.coach', compact('nextSessions', 'upcomingSessions', 'totalParticipants', 'partnerCompanies'));
        } else {
            $nextSessions = \App\Models\Session::whereHas('participants', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('start_time', '>=', $now)
                ->orderBy('start_time')
                ->withCount('participants')
                ->get();
            $registeredSessions = $nextSessions->count();
            $availableSessions = \App\Models\Session::where('start_time', '>=', $now)
                ->whereDoesntHave('participants', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->count();
            return view('dashboard.employee', compact('nextSessions', 'registeredSessions', 'availableSessions'));
        }
    }
}
