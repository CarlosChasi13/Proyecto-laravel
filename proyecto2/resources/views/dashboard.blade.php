@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row g-4">
        <div class="col-md-6">
            <canvas id="bar-chart" class="w-100"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="bar-chart-horizontal" class="w-100"></canvas>
        </div>
        <div class="col-md-12">
            <canvas id="doughnut-chart" class="w-100"></canvas>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
    // Datos de los NRCs por materia
    var nrcsPorMateria = @json($nrcsPorMateria);

    // Obtener los nombres de las materias y los NRCs
    var materias = nrcsPorMateria.map(item => item.nombre);
    var nrcs = nrcsPorMateria.map(item => item.total);

    // Configurar el gráfico de barras
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: materias,
            datasets: [{
                label: "NRCs por Materia",
                backgroundColor: "#3e95cd",
                data: nrcs
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'NRCs por Materia'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0
                    }
                }]
            }
        }
    });

 

    /*// Configurar el gráfico de dona
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [2478, 5267, 734, 784, 433]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Predicted world population (millions) in 2050'
            }
        }
    });
	*/
</script>
@endsection
