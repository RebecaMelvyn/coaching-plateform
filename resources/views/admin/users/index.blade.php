@php
    $roleLabels = [
        'coach' => 'Coach',
        'employee' => 'Salarié',
        'employé' => 'Salarié',
        'admin' => 'Admin',
    ];
@endphp

<x-admin-layout>
    <x-slot name="header">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="subtitle">{{ __('Gérez les comptes coachs et salariés') }}</x-slot>

    @include('admin.partials.flash')

    <x-admin.page-card title="Gestion des utilisateurs">
        <x-slot name="actions">
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row">
                <input
                    type="search"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Rechercher par nom ou email…"
                    class="admin-input w-full sm:w-72"
                >
                <button type="submit" class="admin-btn-primary">
                    Rechercher
                </button>
                @if ($search !== '')
                    <a href="{{ route('admin.users.index') }}" class="admin-btn-secondary">
                        Effacer
                    </a>
                @endif
            </form>
        </x-slot>

        @if ($users->isEmpty())
            <p class="text-center text-sm text-ink-muted">Aucun utilisateur trouvé.</p>
        @else
            {{-- Tableau desktop --}}
            <div class="hidden overflow-x-auto md:block">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead>
                        <tr class="admin-table-head">
                            <th class="px-4 py-3">Nom</th>
                            <th class="px-4 py-3">E-mail</th>
                            <th class="px-4 py-3">Entreprise</th>
                            <th class="px-4 py-3">Rôle</th>
                            <th class="px-4 py-3">Inscrit le</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-4 py-4 font-semibold text-ink">{{ $user->name }}</td>
                                <td class="px-4 py-4 text-sm text-ink-muted">{{ $user->email }}</td>
                                <td class="px-4 py-4 text-sm text-ink-muted">{{ $user->company?->name ?? '—' }}</td>
                                <td class="px-4 py-4">
                                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="search" value="{{ $search }}">
                                        <input type="hidden" name="page" value="{{ $users->currentPage() }}">
                                        <select name="role" class="admin-input w-full text-sm" onchange="this.form.querySelector('[data-company-field]').classList.toggle('hidden', this.value !== 'employee')">
                                            <option value="coach" @selected($user->role === 'coach')>Coach</option>
                                            <option value="employee" @selected(in_array($user->role, ['employee', 'employé']))>Salarié</option>
                                            <option value="admin" @selected($user->role === 'admin')>Admin</option>
                                        </select>
                                        <div data-company-field @class(['hidden' => ! in_array($user->role, ['employee', 'employé'])])>
                                            <select name="company_id" class="admin-input w-full text-sm">
                                                <option value="">— Entreprise —</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" @selected($user->company_id == $company->id)>{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="admin-btn-primary px-3 py-1.5 text-xs">
                                            Enregistrer
                                        </button>
                                    </form>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500">{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-4 text-right">
                                    @if ($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="search" value="{{ $search }}">
                                            <input type="hidden" name="page" value="{{ $users->currentPage() }}">
                                            <button type="submit" class="admin-btn-danger">
                                                Supprimer
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400">Compte actuel</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Cartes mobile --}}
            <div class="space-y-4 md:hidden">
                @foreach ($users as $user)
                    <div class="rounded-xl border border-primary/10 bg-gray-50/80 p-4">
                        <div class="mb-3 flex items-start justify-between gap-2">
                            <div class="min-w-0">
                                <h4 class="font-semibold text-primary">{{ $user->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                <p class="mt-1 text-xs text-gray-500">{{ $user->company?->name ?? 'Sans entreprise' }}</p>
                            </div>
                            <span class="shrink-0 rounded-full bg-violet-100 px-2.5 py-0.5 text-xs font-bold text-violet-800">
                                {{ $roleLabels[$user->role] ?? ucfirst($user->role) }}
                            </span>
                        </div>
                        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-2 border-t border-primary/10 pt-3">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="search" value="{{ $search }}">
                            <input type="hidden" name="page" value="{{ $users->currentPage() }}">
                            <select name="role" class="w-full rounded-lg border-gray-300 text-sm focus:border-primary focus:ring-primary" onchange="this.form.querySelector('[data-company-field]').classList.toggle('hidden', this.value !== 'employee')">
                                <option value="coach" @selected($user->role === 'coach')>Coach</option>
                                <option value="employee" @selected(in_array($user->role, ['employee', 'employé']))>Salarié</option>
                                <option value="admin" @selected($user->role === 'admin')>Admin</option>
                            </select>
                            <div data-company-field @class(['hidden' => ! in_array($user->role, ['employee', 'employé'])])>
                                <select name="company_id" class="w-full rounded-lg border-gray-300 text-sm focus:border-primary focus:ring-primary">
                                    <option value="">— Entreprise —</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" @selected($user->company_id == $company->id)>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="w-full rounded-lg bg-violet-500 px-3 py-2 text-xs font-bold text-white hover:bg-violet-600">
                                Enregistrer le rôle
                            </button>
                        </form>
                        @if ($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Supprimer cet utilisateur ?')" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="search" value="{{ $search }}">
                                <input type="hidden" name="page" value="{{ $users->currentPage() }}">
                                <button type="submit" class="w-full rounded-lg bg-red-500 px-3 py-2 text-xs font-bold text-white hover:bg-red-600">
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>
        @endif
    </x-admin.page-card>
</x-admin-layout>
