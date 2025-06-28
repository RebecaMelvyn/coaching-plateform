<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Company;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with('company')->latest()->paginate(10);
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('participants.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company_id' => 'required|exists:companies,id',
            'notes' => 'nullable|string',
        ]);

        Participant::create($validated);

        return redirect()->route('participants.index')
            ->with('success', 'Participant ajouté avec succès.');
    }

    public function show(Participant $participant)
    {
        return view('participants.show', compact('participant'));
    }

    public function edit(Participant $participant)
    {
        $companies = Company::all();
        return view('participants.edit', compact('participant', 'companies'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company_id' => 'required|exists:companies,id',
            'notes' => 'nullable|string',
        ]);

        $participant->update($validated);

        return redirect()->route('participants.index')
            ->with('success', 'Participant mis à jour avec succès.');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect()->route('participants.index')
            ->with('success', 'Participant supprimé avec succès.');
    }
}
