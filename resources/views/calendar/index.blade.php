<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-primary leading-tight drop-shadow-sm">{{ __('Calendrier des sessions') }}</h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card shadow-xl">
                <div class="p-8 text-gray-900">
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="mt-6 flex gap-4 justify-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-blue-600 text-white shadow">Séances auxquelles je participe/j'anime</span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-violet-500 text-white shadow">Autres séances</span>
            </div>
        </div>
    </div>
    <style>
        #calendar {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.08);
            padding: 2rem;
            min-height: 700px;
            max-width: 1100px;
            margin: 0 auto;
        }
        .fc-event {
            font-size: 1rem;
            padding: 6px 10px;
            border-radius: 8px;
            border: none;
        }
        .fc-toolbar-title {
            font-size: 1.4rem;
            font-weight: 700;
        }
        .fc-daygrid-event-dot {
            margin-right: 6px;
        }
    </style>
    @push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var events = [];
            let nextEventDate = null;
            @php $hasEvent = false; @endphp
            @foreach($sessions as $session)
                @php
                    $isMine = false;
                    if(auth()->user()->role === 'employee') {
                        $isMine = $session->participants->contains(auth()->id());
                    } elseif(auth()->user()->role === 'coach') {
                        $isMine = $session->coach && $session->coach->id === auth()->id();
                    }
                @endphp
                @if((auth()->user()->role === 'employee' && $isMine) || (auth()->user()->role === 'coach' && $isMine) || (auth()->user()->role !== 'employee' && auth()->user()->role !== 'coach'))
                @php $hasEvent = true; @endphp
                events.push({
                    title: `{{ $session->title }}`,
                    start: `{{ $session->start_time }}`,
                    @if($session->end_time)
                    end: `{{ $session->end_time }}`,
                    @else
                    end: `{{ \Carbon\Carbon::parse($session->start_time)->addMinutes($session->duration)->format('Y-m-d\TH:i:s') }}`,
                    @endif
                    url: '{{ route('sessions.show', $session) }}',
                    description: `Entreprise: {{ $session->company ? $session->company->name : '' }}\nCoach: {{ $session->coach ? $session->coach->name : '' }}\nPlaces: {{ $session->registrations_count }}/{{ $session->max_participants }}`,
                    color: '{{ $isMine ? '#2563eb' : '#a78bfa' }}',
                });
                if (!nextEventDate || new Date(`{{ $session->start_time }}`) < nextEventDate) {
                    nextEventDate = new Date(`{{ $session->start_time }}`);
                }
                @endif
            @endforeach
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: 'fr',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: events,
                eventDidMount: function(info) {
                    if (info.event.extendedProps.description) {
                        info.el.setAttribute('title', info.event.extendedProps.description.replace(/\n/g, '\n'));
                    }
                },
                scrollTime: nextEventDate ? nextEventDate.toTimeString().slice(0,5) : '08:00:00',
                initialDate: nextEventDate ? nextEventDate.toISOString().slice(0,10) : undefined,
            });
            calendar.render();
            @if(!$hasEvent)
                var help = document.createElement('div');
                help.className = 'text-center text-gray-500 mt-8';
                help.innerText = "Aucune séance à afficher dans le calendrier.";
                calendarEl.appendChild(help);
            @endif
        });
    </script>
    @endpush
</x-app-layout> 