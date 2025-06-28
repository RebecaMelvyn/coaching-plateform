<?php

namespace App\Http\Controllers;

use App\Models\CoachingSession;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $query = CoachingSession::with(['participants', 'coach']);

        if ($user->role === 'employee') {
            // Pour un employé, on ne montre que ses sessions
            $query->whereHas('participants', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        } elseif ($user->role === 'coach') {
            // Pour un coach, on ne montre que ses sessions
            $query->where('coach_id', $user->id);
        }

        $sessions = $query->where('start_time', '>=', Carbon::now())
            ->orderBy('start_time')
            ->get();

        return view('calendar.index', compact('sessions'));
    }
}
