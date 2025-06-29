<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-extrabold text-2xl text-primary leading-tight drop-shadow-sm">{{ __('Sessions') }}</h2>
            @if(auth()->user()->role === 'coach')
                <a href="{{ route('sessions.create') }}" class="px-6 py-3 rounded-xl bg-blue-600 font-bold text-white shadow-lg transition-transform hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-blue-400">Créer une nouvelle session</a>
            @endif
        </div>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card shadow-xl">
                <div class="p-8 text-gray-900">
                    @if(auth()->user()->role === 'employee')
                        <h3 class="text-xl font-bold text-primary mb-6">Sessions auxquelles je suis inscrit</h3>
                        @php $registeredSessions = $sessions->filter(function($session) { return $session->participants->contains(auth()->id()); }); @endphp
                        @if($registeredSessions->isEmpty())
                            <p class="text-center text-gray-500 mb-6">Aucune session réservée.</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-10">
                                @foreach($registeredSessions as $session)
                                    <div class="glass-card border border-primary/10 p-6 flex flex-col shadow-lg hover:shadow-2xl transition-all">
                                        <h3 class="text-lg font-semibold mb-2 text-primary">{{ $session->title }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $session->description }}</p>
                                        <div class="space-y-2 text-sm">
                                            <p><strong>Date:</strong> {{ $session->start_time->format('d/m/Y H:i') }}</p>
                                            <p><strong>Lieu:</strong> {{ $session->location }}</p>
                                            <p><strong>Coach:</strong> {{ $session->coach->name }}</p>
                                            <p><strong>Participants:</strong> {{ $session->registrations_count }}/{{ $session->max_participants }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('sessions.show', $session) }}" class="text-primary font-bold hover:underline">Voir les détails</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <h3 class="text-xl font-bold text-primary mb-6">Sessions disponibles à la réservation</h3>
                        @php $availableSessions = $sessions->filter(function($session) { return !$session->participants->contains(auth()->id()) && $session->registrations_count < $session->max_participants; }); @endphp
                        @if($availableSessions->isEmpty())
                            <p class="text-center text-gray-500">Aucune session disponible à la réservation.</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                @foreach($availableSessions as $session)
                                    <div class="glass-card border border-primary/10 p-6 flex flex-col shadow-lg hover:shadow-2xl transition-all">
                                        <h3 class="text-lg font-semibold mb-2 text-primary">{{ $session->title }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $session->description }}</p>
                                        <div class="space-y-2 text-sm">
                                            <p><strong>Date:</strong> {{ $session->start_time->format('d/m/Y H:i') }}</p>
                                            <p><strong>Lieu:</strong> {{ $session->location }}</p>
                                            <p><strong>Coach:</strong> {{ $session->coach->name }}</p>
                                            <p><strong>Participants:</strong> {{ $session->registrations_count }}/{{ $session->max_participants }}</p>
                                        </div>
                                        <div class="mt-4 flex gap-2">
                                            <a href="{{ route('sessions.show', $session) }}" class="text-primary font-bold hover:underline">Voir les détails</a>
                                            <form method="POST" action="{{ route('sessions.register', $session) }}">@csrf
                                                <button type="submit" class="px-4 py-2 rounded-lg bg-violet-500 text-white font-bold shadow-md hover:scale-105 hover:shadow-xl transition-all">S'inscrire</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @else
                        @if($sessions->isEmpty())
                            <p class="text-center text-gray-500">Aucune session trouvée.</p>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                @foreach($sessions as $session)
                                    <div class="glass-card border border-primary/10 p-6 flex flex-col shadow-lg hover:shadow-2xl transition-all">
                                        <h3 class="text-lg font-semibold mb-2 text-primary">{{ $session->title }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $session->description }}</p>
                                        <div class="space-y-2 text-sm">
                                            <p><strong>Date:</strong> {{ $session->start_time->format('d/m/Y H:i') }}</p>
                                            <p><strong>Lieu:</strong> {{ $session->location }}</p>
                                            <p><strong>Coach:</strong> {{ $session->coach->name }}</p>
                                            <p><strong>Participants:</strong> {{ $session->registrations_count }}/{{ $session->max_participants }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('sessions.show', $session) }}" class="text-primary font-bold hover:underline">Voir les détails</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
