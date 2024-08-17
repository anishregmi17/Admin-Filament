<x-filament::widget>
    <x-filament::card>
        <h2>Customer Registration by Month</h2>
        <canvas id="customerChart"></canvas>
    </x-filament::card>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('customerChart').getContext('2d');
            const customerChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json(array_keys($customers)),
                    datasets: [{
                        label: '# of Customers',
                        data: @json(array_values($customers)),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-filament::widget>
