<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;


class SessionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'coach') {
            $sessions = Session::where('coach_id', $user->id)
                ->where('start_time', '>=', Carbon::now())
                ->with(['participants', 'coach'])
                ->withCount('participants')
                ->orderBy('start_time')
                ->get();
        } else {
            $sessions = Session::where('start_time', '>=', Carbon::now())
                ->with(['participants', 'coach'])
                ->withCount('participants')
                ->orderBy('start_time')
                ->get();
        }

        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('sessions.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date|after:now',
            'duration' => 'required|integer|min:15',
            'location' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'max_participants' => 'required|integer|min:1',
        ]);

        $session = Session::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_time' => $validated['start_time'],
            'duration' => $validated['duration'],
            'location' => $validated['location'],
            'company_id' => $validated['company_id'],
            'max_participants' => $validated['max_participants'],
            'coach_id' => Auth::id(),
        ]);

        return redirect()->route('sessions.show', $session)
            ->with('success', 'Séance créée avec succès.');
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    public function register(Session $session)
    {
        if (Auth::user()->role !== 'employee') {
            return redirect()->back()->with('error', 'Seuls les employés peuvent s\'inscrire aux sessions.');
        }

        if ($session->registrations_count >= $session->max_participants) {
            return redirect()->back()->with('error', 'Cette session est complète.');
        }

        // Vérifier si l'employé n'est pas déjà inscrit
        if ($session->participants()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cette session.');
        }

        $session->participants()->attach(Auth::id());

        return redirect()->back()->with('success', 'Vous êtes maintenant inscrit à cette session.');
    }

    public function edit(Session $session)
    {
        $companies = Company::all();
        return view('sessions.edit', compact('session', 'companies'));
    }

    public function update(Request $request, Session $session)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date|after:now',
            'duration' => 'required|integer|min:15',
            'location' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'max_participants' => 'required|integer|min:1',
        ]);
        $session->update($validated);
        return redirect()->route('sessions.show', $session)->with('success', 'Séance mise à jour avec succès.');
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Séance supprimée avec succès.');
    }
}
