<x-admin-layout>
    <x-slot name="header">{{ __('Statistiques') }}</x-slot>
    <x-slot name="subtitle">{{ __('Analyse des inscriptions et de l\'activité') }}</x-slot>

    @include('admin.partials.flash')

    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <x-admin.stat-card label="Nombre d'utilisateurs" :value="number_format($stats['users'], 0, ',', ' ')" color="blue">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </x-slot>
        </x-admin.stat-card>
        <x-admin.stat-card label="Nombre de séances" :value="number_format($stats['sessions'], 0, ',', ' ')" color="emerald">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </x-slot>
        </x-admin.stat-card>
    </div>

    <div class="grid grid-cols-1 gap-8 xl:grid-cols-2">
        <x-admin.page-card title="Inscriptions par mois">
            <div class="relative h-80 w-full">
                <canvas id="registrationsByMonthChart"></canvas>
            </div>
        </x-admin.page-card>

        <x-admin.page-card title="Répartition par entreprise">
            @if ($registrationsByCompany->isEmpty())
                <p class="text-center text-sm text-ink-muted">Aucune inscription par entreprise pour le moment.</p>
            @else
                <div class="relative mx-auto h-80 w-full max-w-md">
                    <canvas id="registrationsByCompanyChart"></canvas>
                </div>
            @endif
        </x-admin.page-card>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const monthLabels = @json($registrationsByMonth->pluck('label'));
                const monthData = @json($registrationsByMonth->pluck('count'));
                const companyLabels = @json($registrationsByCompany->pluck('company_name'));
                const companyData = @json($registrationsByCompany->pluck('total'));

                const coachProColors = ['#2563eb', '#6366f1', '#22c55e', '#fbbf24', '#ec4899', '#14b8a6', '#f97316', '#a78bfa'];

                Chart.defaults.font.family = 'Inter, ui-sans-serif, system-ui';
                Chart.defaults.color = '#64748b';

                new Chart(document.getElementById('registrationsByMonthChart'), {
                    type: 'bar',
                    data: {
                        labels: monthLabels,
                        datasets: [{
                            label: 'Inscriptions',
                            data: monthData,
                            backgroundColor: '#2563eb',
                            borderRadius: 8,
                            borderSkipped: false,
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0, font: { family: 'ui-monospace, monospace' } },
                                grid: { color: 'rgba(148, 163, 184, 0.15)' },
                            },
                            x: { grid: { display: false } },
                        },
                    },
                });

                const companyCanvas = document.getElementById('registrationsByCompanyChart');
                if (companyCanvas) {
                    new Chart(companyCanvas, {
                        type: 'doughnut',
                        data: {
                            labels: companyLabels,
                            datasets: [{
                                data: companyData,
                                backgroundColor: coachProColors,
                                borderWidth: 2,
                                borderColor: '#ffffff',
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                    labels: { padding: 16, usePointStyle: true },
                                },
                            },
                        },
                    });
                }
            });
        </script>
    @endpush
</x-admin-layout>
