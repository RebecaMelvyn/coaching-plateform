<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-primary leading-tight drop-shadow-sm">
            {{ __('Tableau de bord Coach') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="bg-white p-8 flex flex-col items-center text-center shadow-xl rounded-2xl">
                    <h3 class="text-lg font-semibold mb-2 text-primary">Sessions à venir</h3>
                    <p class="text-4xl font-extrabold text-blue-600 drop-shadow">{{ $upcomingSessions }}</p>
                </div>
                <div class="bg-white p-8 flex flex-col items-center text-center shadow-xl rounded-2xl">
                    <h3 class="text-lg font-semibold mb-2 text-green-600">Total participants</h3>
                    <p class="text-4xl font-extrabold text-green-600 drop-shadow">{{ $totalParticipants }}</p>
                </div>
            </div>

            {{-- Titre dynamique selon le rôle --}}
            @php
                $isCoach = isset($next) && $next->coach_id === auth()->id();
            @endphp
            <h3 class="text-xl font-bold text-primary mb-4">
                Séances auxquelles {{ $isCoach ? "+ j'anime" : "je participe" }}
            </h3>

            {{-- Mise en avant de la prochaine séance --}}
            @if($nextSessions->count() > 0)
                @php $next = $nextSessions->first(); @endphp
                <div class="bg-blue-50 border-l-4 border-blue-600 shadow-lg rounded-2xl p-8 mb-8 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-blue-700 mb-2 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            Prochaine séance : {{ $next->title }}
                        </h3>
                        <div class="text-gray-700 mb-1">Entreprise : <span class="font-semibold">{{ $next->company->name ?? '-' }}</span></div>
                        <div class="text-gray-700 mb-1">Type : <span class="font-semibold">{{ ucfirst($next->type) }}</span></div>
                        <div class="text-gray-700 mb-1">Date & heure : <span class="font-semibold">{{ $next->start_time->format('d/m/Y H:i') }}</span></div>
                        <div class="text-gray-700 mb-1">Participants : <span class="font-semibold">{{ $next->registrations_count }}</span></div>
                        <div class="mt-2">
                            @if($next->coach_id === auth()->id())
                                <span class="inline-block bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">J'anime</span>
                            @else
                                <span class="inline-block bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full">Je participe</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <button onclick="document.getElementById('participants-modal').classList.remove('hidden')" class="px-6 py-3 rounded-xl bg-blue-600 font-bold text-white shadow-lg hover:bg-blue-700 transition">Voir les participants</button>
                    </div>
                </div>
                {{-- Modal participants --}}
                <div id="participants-modal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-lg w-full relative">
                        <button onclick="document.getElementById('participants-modal').classList.add('hidden')" class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                        <h4 class="text-xl font-bold mb-4 text-blue-700">Participants à la séance</h4>
                        @if($next->participants && count($next->participants) > 0)
                            <ul class="divide-y divide-gray-200">
                                @foreach($next->participants as $participant)
                                    <li class="py-2 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                        <span class="font-semibold">{{ $participant->name }}</span>
                                        <span class="text-gray-500 text-sm">{{ $participant->email ?? '' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">Aucun participant inscrit pour le moment.</p>
                        @endif
                    </div>
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                        <h3 class="text-xl font-bold text-primary">Prochaines sessions</h3>
                        <a href="{{ route('sessions.create') }}" class="px-6 py-3 rounded-xl bg-blue-600 font-bold text-white shadow-lg transition-transform hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-blue-400">Nouvelle session</a>
                    </div>
                    @if($nextSessions->count() > 1)
                        <div class="space-y-4">
                            @foreach($nextSessions->skip(1) as $session)
                                <div class="bg-gray-50 border border-primary/10 p-5 flex flex-col md:flex-row justify-between items-center hover:shadow-2xl transition-all rounded-xl">
                                    <div class="flex-1 text-left">
                                        <h4 class="font-semibold text-lg text-primary">{{ $session->title }}</h4>
                                        <p class="text-sm text-gray-600">{{ $session->type }}</p>
                                    </div>
                                    <div class="text-right mt-2 md:mt-0">
                                        <p class="text-sm font-medium text-dark">{{ $session->start_time->format('d/m/Y H:i') }}</p>
                                        <p class="text-sm text-gray-600">{{ $session->registrations_count }} participants</p>
                                        @if($session->coach_id === auth()->id())
                                            <span class="inline-block bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full mt-1">J'anime</span>
                                        @else
                                            <span class="inline-block bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full mt-1">Je participe</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Aucune autre session prévue</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 