<x-admin-layout>
    <x-slot name="header">
        {{ __('Statistiques') }}
    </x-slot>

    @include('admin.partials.flash')

    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <x-admin.stat-card label="Nombre d'utilisateurs" :value="$stats['users']" color="blue" />
        <x-admin.stat-card label="Nombre de séances" :value="$stats['sessions']" color="indigo" />
    </div>

    <div class="grid grid-cols-1 gap-8 xl:grid-cols-2">
        <x-admin.page-card title="Inscriptions par mois">
            <div class="relative h-80 w-full">
                <canvas id="registrationsByMonthChart"></canvas>
            </div>
        </x-admin.page-card>

        <x-admin.page-card title="Répartition par entreprise">
            @if ($registrationsByCompany->isEmpty())
                <p class="text-center text-sm text-gray-500">Aucune inscription par entreprise pour le moment.</p>
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

                const coachProColors = ['#2563eb', '#a78bfa', '#22c55e', '#fbbf24', '#6366f1', '#ec4899', '#14b8a6', '#f97316'];

                Chart.defaults.font.family = 'Inter, ui-sans-serif, system-ui';
                Chart.defaults.color = '#374151';

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
                        plugins: {
                            legend: { display: false },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0 },
                                grid: { color: 'rgba(37, 99, 235, 0.08)' },
                            },
                            x: {
                                grid: { display: false },
                            },
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
                                    labels: {
                                        padding: 16,
                                        usePointStyle: true,
                                    },
                                },
                            },
                        },
                    });
                }
            });
        </script>
    @endpush
</x-admin-layout>
