<x-app-layout>
    <x-slot name="header">Entreprises</x-slot>
    <x-slot name="subtitle">Gérez vos entreprises partenaires</x-slot>
    <x-slot name="action">
        <a href="{{ route('companies.create') }}" class="app-btn-primary">Nouvelle entreprise</a>
    </x-slot>

    <x-admin.page-card>
        @if ($companies->isEmpty())
            <p class="text-center text-sm text-ink-muted">Aucune entreprise trouvée.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead>
                        <tr class="app-table-head">
                            <th class="px-4 py-3">Nom</th>
                            <th class="px-4 py-3">E-mail</th>
                            <th class="px-4 py-3">Téléphone</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($companies as $company)
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-4 font-semibold text-ink">{{ $company->name }}</td>
                                <td class="px-4 py-4 text-sm text-ink-muted">{{ $company->email ?? '—' }}</td>
                                <td class="px-4 py-4 text-sm text-ink-muted">{{ $company->phone ?? '—' }}</td>
                                <td class="px-4 py-4 text-right">
                                    <a href="{{ route('companies.edit', $company) }}" class="text-sm font-semibold text-primary hover:text-primary-dark">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-admin.page-card>
</x-app-layout>
