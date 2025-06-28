<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Sessions') }}
            </h2>
            @if(auth()->user()->role === 'coach')
                <a href="{{ route('sessions.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Créer une nouvelle session
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($sessions->isEmpty())
                        <p class="text-center text-gray-500">Aucune session trouvée.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($sessions as $session)
                                <div class="bg-white border rounded-lg shadow-sm p-6">
                                    <h3 class="text-lg font-semibold mb-2">{{ $session->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $session->description }}</p>
                                    <div class="space-y-2">
                                        <p><strong>Date:</strong> {{ $session->start_time->format('d/m/Y H:i') }}</p>
                                        <p><strong>Lieu:</strong> {{ $session->location }}</p>
                                        <p><strong>Coach:</strong> {{ $session->coach->name }}</p>
                                        <p><strong>Participants:</strong> {{ $session->registrations_count }}/{{ $session->max_participants }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('sessions.show', $session) }}" class="text-blue-600 hover:text-blue-900">Voir les détails</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
