<x-admin-layout>
    <x-slot name="header">
        {{ __('Entreprises') }}
    </x-slot>

    @include('admin.partials.flash')

    <x-admin.page-card title="Liste des entreprises">
        <x-slot name="actions">
            <a href="{{ route('admin.companies.create') }}" class="rounded-xl bg-primary px-4 py-2 text-sm font-bold text-white shadow-md transition hover:bg-primary-dark">
                Nouvelle entreprise
            </a>
        </x-slot>

        @if ($companies->isEmpty())
            <p class="text-center text-sm text-gray-500">Aucune entreprise enregistrée.</p>
        @else
            <div class="hidden overflow-x-auto md:block">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                            <th class="px-4 py-3">Nom</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Téléphone</th>
                            <th class="px-4 py-3">Séances</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($companies as $company)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-4 py-4">
                                    <p class="font-semibold text-primary">{{ $company->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $company->address ?? '—' }}</p>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $company->email ?? $company->contact_email ?? '—' }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $company->phone ?? '—' }}</td>
                                <td class="px-4 py-4">
                                    <span class="rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-bold text-indigo-800">
                                        {{ $company->sessions_count }}
                                    </span>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.companies.edit', $company) }}" class="rounded-lg bg-violet-500 px-3 py-1.5 text-xs font-bold text-white hover:bg-violet-600">
                                            Modifier
                                        </a>
                                        <form method="POST" action="{{ route('admin.companies.destroy', $company) }}" onsubmit="return confirm('Supprimer cette entreprise ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg bg-red-500 px-3 py-1.5 text-xs font-bold text-white hover:bg-red-600">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="space-y-4 md:hidden">
                @foreach ($companies as $company)
                    <div class="rounded-xl border border-primary/10 bg-gray-50/80 p-4">
                        <h4 class="font-semibold text-primary">{{ $company->name }}</h4>
                        <p class="mt-1 text-sm text-gray-500">{{ $company->address ?? 'Adresse non renseignée' }}</p>
                        <div class="mt-3 flex flex-wrap gap-2 text-xs">
                            <span class="rounded-full bg-amber-100 px-2.5 py-0.5 font-medium text-amber-800">{{ $company->email ?? $company->contact_email ?? 'Sans email' }}</span>
                            <span class="rounded-full bg-indigo-100 px-2.5 py-0.5 font-bold text-indigo-800">{{ $company->sessions_count }} séance(s)</span>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('admin.companies.edit', $company) }}" class="flex-1 rounded-lg bg-violet-500 px-3 py-2 text-center text-xs font-bold text-white hover:bg-violet-600">
                                Modifier
                            </a>
                            <form method="POST" action="{{ route('admin.companies.destroy', $company) }}" onsubmit="return confirm('Supprimer cette entreprise ?')" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full rounded-lg bg-red-500 px-3 py-2 text-xs font-bold text-white hover:bg-red-600">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $companies->links() }}
            </div>
        @endif
    </x-admin.page-card>
</x-admin-layout>
