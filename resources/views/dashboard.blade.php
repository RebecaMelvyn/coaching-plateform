<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Coach') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Sessions à venir</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $upcomingSessions ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Entreprises partenaires</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $partnerCompanies ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Participants total</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ $totalParticipants ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Prochaines sessions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Prochaines sessions</h3>
                        <a href="{{ route('sessions.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Nouvelle session') }}
                        </a>
                    </div>
                    
                    @if(isset($nextSessions) && count($nextSessions) > 0)
                        <div class="space-y-4">
                            @foreach($nextSessions as $session)
                                <div class="border rounded-lg p-4 hover:bg-gray-50">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h4 class="font-semibold">{{ $session->title }}</h4>
                                            <p class="text-sm text-gray-600">{{ $session->company->name }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-medium">{{ $session->start_time->format('d/m/Y H:i') }}</p>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($session->type === 'sport') bg-green-100 text-green-800
                                                @elseif($session->type === 'bien-être') bg-blue-100 text-blue-800
                                                @else bg-purple-100 text-purple-800
                                                @endif">
                                                {{ $session->type }}
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
