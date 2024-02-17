<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Aquí muestra la información del usuario -->
        <div>
            <p>Nombre: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <!-- Agrega más campos según sea necesario -->
        </div>

        <!-- Aquí puedes agregar el código para el Stacked Bar Chart -->
        <canvas id="stackedBarChart" style="height: 400px; width: 100%;"></canvas>
    </div>
</x-app-layout>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtén los datos para el gráfico desde el controlador y pásalos al JavaScript
        var materias = @json($asignaturas);
        var nrcs = @json($nrcs);

        // Configura los datos para el gráfico
        var stackedBarChartData = {
            labels: asignaturas,
            datasets: [{
                label: 'NRCS',
                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Color de fondo del gráfico
                data: nrcs,
            }]
        };

        // Configura las opciones del gráfico
        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        };

        // Dibuja el gráfico
        var ctx = document.getElementById('stackedBarChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        });
    });
</script>
@endpush
