<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Employé') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Sessions inscrites</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $registeredSessions }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Sessions disponibles</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $availableSessions }}</p>
                    </div>
                </div>
            </div>

            <!-- Prochaines sessions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Mes prochaines sessions</h3>
                        <a href="{{ route('sessions.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voir toutes les sessions
                        </a>
                    </div>
                    
                    @if($nextSessions->count() > 0)
                        <div class="space-y-4">
                            @foreach($nextSessions as $session)
                                <div class="border rounded-lg p-4 hover:bg-gray-50">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h4 class="font-semibold">{{ $session->title }}</h4>
                                            <p class="text-sm text-gray-600">{{ $session->type }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-medium">{{ $session->start_time->format('d/m/Y H:i') }}</p>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Inscrit
                                            </span>
                                        </div>
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