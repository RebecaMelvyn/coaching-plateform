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

        if ($user->role === 'coach') {
            $sessions = Session::where('coach_id', $user->id)
                ->withCount('participants')
                ->orderBy('start_time')
                ->get();
        } else {
            $sessions = Session::whereHas('participants', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
                ->withCount('participants')
                ->orderBy('start_time')
                ->get();
        }

        return view('dashboard', compact('sessions'));
    }
}
