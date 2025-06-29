<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $sessions = Session::with(['participants', 'coach', 'company'])
            ->where('start_time', '>=', Carbon::now())
            ->orderBy('start_time')
            ->get();

        return view('calendar.index', compact('sessions'));
    }
}
