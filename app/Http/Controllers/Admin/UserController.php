<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();

        $users = User::query()
            ->with('company')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $companies = Company::orderBy('name')->get(['id', 'name']);

        return view('admin.users.index', compact('users', 'search', 'companies'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'role' => ['required', 'in:coach,employee,admin'],
            'company_id' => ['nullable', 'required_if:role,employee', 'exists:companies,id'],
        ]);

        if ($validated['role'] === 'employee') {
            $user->update([
                'role' => 'employee',
                'company_id' => $validated['company_id'],
            ]);
        } else {
            $user->update([
                'role' => $validated['role'],
                'company_id' => null,
            ]);
        }

        return redirect()
            ->route('admin.users.index', $request->only('search', 'page'))
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index', $request->only('search', 'page'))
                ->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index', $request->only('search', 'page'))
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
