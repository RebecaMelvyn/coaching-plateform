<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la session') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">{{ $session->title }}</h3>
                        <p class="text-gray-600">{{ $session->description }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p><strong>Date de début :</strong> {{ $session->start_time->format('d/m/Y H:i') }}</p>
                            <p><strong>Durée :</strong> {{ $session->duration }} minutes</p>
                            <p><strong>Lieu :</strong> {{ $session->location }}</p>
                        </div>
                        <div>
                            <p><strong>Nombre maximum de participants :</strong> {{ $session->max_participants }}</p>
                            <p><strong>Coach :</strong> {{ $session->coach->name }}</p>
                            @if($session->company)
                                <p><strong>Entreprise :</strong> {{ $session->company->name }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        @if(auth()->user()->role === 'coach')
                            <a href="{{ route('sessions.edit', $session) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Modifier
                            </a>
                            <form action="{{ route('sessions.destroy', $session) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette session ?')">
                                    Supprimer
                                </button>
                            </form>
                        @elseif(auth()->user()->role === 'employee')
                            @if($session->registrations_count < $session->max_participants)
                                <form action="{{ route('sessions.register', $session) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Participer à la session
                                    </button>
                                </form>
                            @else
                                <p class="text-red-500">Cette session est complète</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 