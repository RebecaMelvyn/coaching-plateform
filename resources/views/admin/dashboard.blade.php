<x-admin-layout>
    <x-slot name="header">
        {{ __('Tableau de bord') }}
    </x-slot>

    {{-- Statistiques --}}
    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6">
        <div class="glass-card flex flex-col items-center p-6 text-center shadow-xl">
            <h3 class="mb-2 text-sm font-semibold text-primary">Utilisateurs</h3>
            <p class="text-4xl font-extrabold text-blue-600 drop-shadow">{{ $stats['users'] }}</p>
        </div>
        <div class="glass-card flex flex-col items-center p-6 text-center shadow-xl">
            <h3 class="mb-2 text-sm font-semibold text-accent">Coachs</h3>
            <p class="text-4xl font-extrabold text-violet-500 drop-shadow">{{ $stats['coaches'] }}</p>
        </div>
        <div class="glass-card flex flex-col items-center p-6 text-center shadow-xl">
            <h3 class="mb-2 text-sm font-semibold text-green-600">Salariés</h3>
            <p class="text-4xl font-extrabold text-green-600 drop-shadow">{{ $stats['employees'] }}</p>
        </div>
        <div class="glass-card flex flex-col items-center p-6 text-center shadow-xl">
            <h3 class="mb-2 text-sm font-semibold text-amber-500">Entreprises</h3>
            <p class="text-4xl font-extrabold text-amber-500 drop-shadow">{{ $stats['companies'] }}</p>
        </div>
        <div class="glass-card flex flex-col items-center p-6 text-center shadow-xl">
            <h3 class="mb-2 text-sm font-semibold text-indigo-600">Séances</h3>
            <p class="text-4xl font-extrabold text-indigo-600 drop-shadow">{{ $stats['sessions'] }}</p>
        </div>
        <div class="glass-card flex flex-col items-center p-6 text-center shadow-xl">
            <h3 class="mb-2 text-sm font-semibold text-primary">Inscriptions</h3>
            <p class="text-4xl font-extrabold text-blue-600 drop-shadow">{{ $stats['registrations'] }}</p>
        </div>
    </div>

    {{-- Listes récentes --}}
    <div class="grid grid-cols-1 gap-8 xl:grid-cols-3">
        {{-- Dernières séances --}}
        <div class="glass-card shadow-xl">
            <div class="border-b border-primary/10 px-6 py-4">
                <h3 class="text-lg font-bold text-primary">5 dernières séances</h3>
            </div>
            <div class="p-6">
                @if ($latestSessions->isEmpty())
                    <p class="text-center text-sm text-gray-500">Aucune séance enregistrée.</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($latestSessions as $session)
                            <li class="rounded-xl border border-primary/10 bg-gray-50/80 p-4 transition-all hover:shadow-md">
                                <h4 class="font-semibold text-primary">{{ $session->title }}</h4>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ $session->start_time->format('d/m/Y H:i') }}
                                </p>
                                <div class="mt-2 flex flex-wrap gap-2 text-xs">
                                    @if ($session->coach)
                                        <span class="rounded-full bg-blue-100 px-2.5 py-0.5 font-medium text-blue-800">
                                            {{ $session->coach->name }}
                                        </span>
                                    @endif
                                    @if ($session->company)
                                        <span class="rounded-full bg-amber-100 px-2.5 py-0.5 font-medium text-amber-800">
                                            {{ $session->company->name }}
                                        </span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        {{-- Derniers utilisateurs --}}
        <div class="glass-card shadow-xl">
            <div class="border-b border-primary/10 px-6 py-4">
                <h3 class="text-lg font-bold text-primary">5 derniers utilisateurs</h3>
            </div>
            <div class="p-6">
                @if ($latestUsers->isEmpty())
                    <p class="text-center text-sm text-gray-500">Aucun utilisateur enregistré.</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($latestUsers as $user)
                            <li class="rounded-xl border border-primary/10 bg-gray-50/80 p-4 transition-all hover:shadow-md">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="min-w-0">
                                        <h4 class="truncate font-semibold text-primary">{{ $user->name }}</h4>
                                        <p class="truncate text-sm text-gray-500">{{ $user->email }}</p>
                                    </div>
                                    @if ($user->role === 'coach')
                                        <span class="shrink-0 rounded-full bg-violet-100 px-2.5 py-0.5 text-xs font-bold text-violet-800">Coach</span>
                                    @elseif (in_array($user->role, ['employee', 'employé']))
                                        <span class="shrink-0 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-bold text-green-800">Salarié</span>
                                    @else
                                        <span class="shrink-0 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-bold text-gray-800">{{ ucfirst($user->role) }}</span>
                                    @endif
                                </div>
                                @if ($user->company)
                                    <p class="mt-2 text-xs text-gray-600">{{ $user->company->name }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        {{-- Dernières inscriptions --}}
        <div class="glass-card shadow-xl">
            <div class="border-b border-primary/10 px-6 py-4">
                <h3 class="text-lg font-bold text-primary">5 dernières inscriptions</h3>
            </div>
            <div class="p-6">
                @if ($latestRegistrations->isEmpty())
                    <p class="text-center text-sm text-gray-500">Aucune inscription enregistrée.</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($latestRegistrations as $registration)
                            <li class="rounded-xl border border-primary/10 bg-gray-50/80 p-4 transition-all hover:shadow-md">
                                <h4 class="font-semibold text-primary">{{ $registration->user_name }}</h4>
                                <p class="mt-1 text-sm text-gray-600">{{ $registration->session_title }}</p>
                                <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-gray-500">
                                    <span>{{ \Carbon\Carbon::parse($registration->created_at)->format('d/m/Y H:i') }}</span>
                                    @if ($registration->session_start_time)
                                        <span class="text-gray-400">·</span>
                                        <span>Séance : {{ \Carbon\Carbon::parse($registration->session_start_time)->format('d/m/Y H:i') }}</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
