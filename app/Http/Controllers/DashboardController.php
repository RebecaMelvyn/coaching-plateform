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
            $nextSessions = Session::where('coach_id', $user->id)
                ->where('start_time', '>=', $now)
                ->orderBy('start_time')
                ->with(['company', 'participants'])
                ->withCount('participants')
                ->get();
            $upcomingSessions = $nextSessions->count();
            $totalParticipants = $nextSessions->sum('participants_count');
            $partnerCompanies = $nextSessions->pluck('company_id')->unique()->count();
            $sessionsCreated = Session::where('coach_id', $user->id)->count();
            return view('dashboard.coach', compact('nextSessions', 'upcomingSessions', 'totalParticipants', 'partnerCompanies', 'sessionsCreated'));
        } else {
            $nextSessions = Session::whereHas('participants', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('start_time', '>=', $now)
                ->orderBy('start_time')
                ->with(['coach', 'company'])
                ->withCount('participants')
                ->get();
            $registeredSessions = $nextSessions->count();
            $availableSessions = Session::where('start_time', '>=', $now)
                ->whereDoesntHave('participants', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->count();
            $allAvailable = Session::where('start_time', '>=', $now)
                ->with(['coach', 'company'])
                ->withCount('participants')
                ->whereDoesntHave('participants', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orderBy('start_time')
                ->get();
            return view('dashboard.employee', compact('nextSessions', 'registeredSessions', 'availableSessions', 'allAvailable'));
        }
    }
}
