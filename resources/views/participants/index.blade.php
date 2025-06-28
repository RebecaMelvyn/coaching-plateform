<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($participants->isEmpty())
                        <p class="text-center text-gray-500">Aucun participant trouvé.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Entreprise</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sessions</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($participants as $participant)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $participant->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $participant->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $participant->company->name ?? 'Non assigné' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $participant->sessions_count }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('participants.show', $participant) }}" class="text-blue-600 hover:text-blue-900">Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 