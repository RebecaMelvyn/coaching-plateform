<x-app-layout>
    <x-slot name="header">Calendrier</x-slot>
    <x-slot name="subtitle">Semaine du {{ now()->startOfWeek()->translatedFormat('d') }} au {{ now()->endOfWeek()->translatedFormat('d F Y') }}</x-slot>

    <x-admin.page-card>
        <div id="calendar" class="min-h-[600px]"></div>
    </x-admin.page-card>

    <div class="mt-4 flex flex-wrap justify-center gap-3">
        <x-admin.badge label="Mes séances" variant="default" />
        <x-admin.badge label="Autres séances" variant="violet" />
    </div>

    @push('styles')
    <style>
        #calendar .fc-toolbar-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; }
        #calendar .fc-button-primary { background: #2563eb; border-color: #2563eb; }
        #calendar .fc-button-primary:hover { background: #1e40af; }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/locales/fr.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const events = [];
            @foreach($sessions as $session)
                @php
                    $isMine = auth()->user()->role === 'employee'
                        ? $session->participants->contains(auth()->id())
                        : ($session->coach && $session->coach->id === auth()->id());
                @endphp
                events.push({
                    title: '{{ addslashes($session->title) }}',
                    start: '{{ $session->start_time }}',
                    end: '{{ \Carbon\Carbon::parse($session->start_time)->addMinutes($session->duration)->format('Y-m-d\TH:i:s') }}',
                    url: '{{ route('sessions.show', $session) }}',
                    color: '{{ $isMine ? '#2563eb' : '#a78bfa' }}',
                });
            @endforeach

            new FullCalendar.Calendar(document.getElementById('calendar'), {
                initialView: 'timeGridWeek',
                locale: 'fr',
                headerToolbar: { left: 'prev,next today', center: 'title', right: 'dayGridMonth,timeGridWeek,timeGridDay' },
                buttonText: {
                    today: "Aujourd'hui",
                    month: 'Mois',
                    week: 'Semaine',
                    day: 'Jour',
                    list: 'Liste',
                },
                allDayText: 'Toute la journée',
                weekText: 'Sem.',
                noEventsText: 'Aucun événement à afficher',
                events: events,
                height: 'auto',
            }).render();
        });
    </script>
    @endpush
</x-app-layout>
