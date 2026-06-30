<x-admin-layout>
    <x-slot name="header">{{ __('Séances') }}</x-slot>
    <x-slot name="subtitle">{{ __('Consultez et gérez les séances de coaching') }}</x-slot>

    @include('admin.partials.flash')

    <x-admin.page-card title="Gestion des séances">
        @if ($sessions->isEmpty())
            <p class="text-center text-sm text-gray-500">Aucune séance enregistrée.</p>
        @else
            <div class="hidden overflow-x-auto lg:block">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                            <th class="px-4 py-3">Titre</th>
                            <th class="px-4 py-3">Coach</th>
                            <th class="px-4 py-3">Entreprise</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Places</th>
                            <th class="px-4 py-3">Participants</th>
                            <th class="px-4 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($sessions as $session)
                            <tr class="hover:bg-gray-50/80">
                                <td class="px-4 py-4">
                                    <p class="font-semibold text-primary">{{ $session->title }}</p>
                                    <p class="text-sm text-gray-500">{{ $session->location }}</p>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $session->coach?->name ?? '—' }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $session->company?->name ?? '—' }}</td>
                                <td class="px-4 py-4 text-sm text-gray-600">{{ $session->start_time->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-4">
                                    <span class="rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-800">
                                        {{ $session->max_participants }}
                                    </span>
                                </td>
                                <td class="px-4 py-4">
                                    <span class="rounded-full px-2.5 py-0.5 text-xs font-bold {{ $session->participants_count >= $session->max_participants ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $session->participants_count }} / {{ $session->max_participants }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-right">
                                    <form method="POST" action="{{ route('admin.sessions.destroy', $session) }}" onsubmit="return confirm('Supprimer cette séance ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg bg-red-500 px-3 py-1.5 text-xs font-bold text-white hover:bg-red-600">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="space-y-4 lg:hidden">
                @foreach ($sessions as $session)
                    <div class="rounded-xl border border-primary/10 bg-gray-50/80 p-4">
                        <h4 class="font-semibold text-primary">{{ $session->title }}</h4>
                        <p class="mt-1 text-sm text-gray-600">{{ $session->start_time->format('d/m/Y H:i') }} · {{ $session->location }}</p>
                        <div class="mt-3 flex flex-wrap gap-2 text-xs">
                            @if ($session->coach)
                                <span class="rounded-full bg-violet-100 px-2.5 py-0.5 font-medium text-violet-800">{{ $session->coach->name }}</span>
                            @endif
                            @if ($session->company)
                                <span class="rounded-full bg-amber-100 px-2.5 py-0.5 font-medium text-amber-800">{{ $session->company->name }}</span>
                            @endif
                            <span class="rounded-full bg-green-100 px-2.5 py-0.5 font-bold text-green-800">
                                {{ $session->participants_count }} / {{ $session->max_participants }} places
                            </span>
                        </div>
                        <form method="POST" action="{{ route('admin.sessions.destroy', $session) }}" onsubmit="return confirm('Supprimer cette séance ?')" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full rounded-lg bg-red-500 px-3 py-2 text-xs font-bold text-white hover:bg-red-600">
                                Supprimer
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $sessions->links() }}
            </div>
        @endif
    </x-admin.page-card>
</x-admin-layout>
