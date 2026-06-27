<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function index(): View
    {
        $sessions = Session::query()
            ->with(['coach', 'company'])
            ->withCount('participants')
            ->latest('start_time')
            ->paginate(10);

        return view('admin.sessions.index', compact('sessions'));
    }

    public function destroy(Session $session): RedirectResponse
    {
        $session->delete();

        return redirect()
            ->route('admin.sessions.index')
            ->with('success', 'Séance supprimée avec succès.');
    }
}
