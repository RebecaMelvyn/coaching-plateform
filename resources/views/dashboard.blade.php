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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg flex items-center gap-4">
                    <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </span>
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Sessions à venir</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ $upcomingSessions ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg flex items-center gap-4">
                    <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V7a4 4 0 00-8 0v3m12 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1a6 6 0 0112 0z" /></svg>
                    </span>
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Entreprises partenaires</h3>
                        <p class="text-3xl font-bold text-green-600">{{ $partnerCompanies ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg flex items-center gap-4">
                    <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V7a4 4 0 00-8 0v3m12 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2v-1a6 6 0 0112 0z" /></svg>
                    </span>
                    <div class="text-gray-900">
                        <h3 class="text-lg font-semibold mb-2">Participants total</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ $totalParticipants ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Prochaines sessions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-2">
                        <h3 class="text-lg font-semibold">Prochaines sessions</h3>
                        <a href="{{ route('sessions.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                            {{ __('Nouvelle session') }}
                        </a>
                    </div>
                    
                    @if(isset($nextSessions) && count($nextSessions) > 0)
                        <div class="space-y-4">
                            @foreach($nextSessions as $session)
                                <div class="border rounded-lg p-4 hover:bg-blue-50 transition-colors shadow-sm">
                                    <div class="flex flex-col sm:flex-row justify-between items-center gap-2">
                                        <div class="w-full sm:w-auto">
                                            <h4 class="font-semibold">{{ $session->title }}</h4>
                                            <p class="text-sm text-gray-600">{{ $session->company->name }}</p>
                                        </div>
                                        <div class="text-right w-full sm:w-auto">
                                            <p class="text-sm font-medium">{{ $session->start_time->format('d/m/Y H:i') }}</p>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border
                                                @if($session->type === 'sport') bg-green-100 text-green-800 border-green-300
                                                @elseif($session->type === 'bien-être') bg-blue-100 text-blue-800 border-blue-300
                                                @else bg-purple-100 text-purple-800 border-purple-300
                                                @endif">
                                                {{ ucfirst($session->type) }}
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
