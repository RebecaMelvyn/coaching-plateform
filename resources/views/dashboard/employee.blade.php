<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-primary leading-tight drop-shadow-sm">
            {{ __('Tableau de bord Employé') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="glass-card p-8 flex flex-col items-center text-center shadow-xl">
                    <h3 class="text-lg font-semibold mb-2 text-primary">Sessions inscrites</h3>
                    <p class="text-4xl font-extrabold text-blue-600 drop-shadow">{{ $registeredSessions }}</p>
                </div>
                <div class="glass-card p-8 flex flex-col items-center text-center shadow-xl">
                    <h3 class="text-lg font-semibold mb-2 text-green-600">Sessions disponibles</h3>
                    <p class="text-4xl font-extrabold text-green-600 drop-shadow">{{ $availableSessions }}</p>
                </div>
            </div>
            <div class="glass-card shadow-xl">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                        <h3 class="text-xl font-bold text-primary">Mes prochaines sessions</h3>
                        <a href="{{ route('sessions.index') }}" class="px-6 py-3 rounded-xl bg-violet-500 font-bold text-white shadow-lg transition-transform hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-violet-400">Voir toutes les sessions</a>
                    </div>
                    @if($nextSessions->count() > 0)
                        <div class="space-y-4">
                            @foreach($nextSessions as $session)
                                <div class="glass-card border border-primary/10 p-5 flex flex-col md:flex-row justify-between items-center hover:shadow-2xl transition-all">
                                    <div class="flex-1 text-left">
                                        <h4 class="font-semibold text-lg text-primary">{{ $session->title }}</h4>
                                        <p class="text-sm text-gray-600">{{ $session->type }}</p>
                                    </div>
                                    <div class="text-right mt-2 md:mt-0">
                                        <p class="text-sm font-medium text-dark">{{ $session->start_time->format('d/m/Y H:i') }}</p>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Inscrit</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Aucune session prévue</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 