@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
<div class="container row w-full">
    <div class="col-md-6">
        <canvas id="barChart" class="w-50%"></canvas>
    </div>
    <div class="col-md-4">
        <canvas id="donutChart" class="w-50%"></canvas>
    </div>
    <div class="col-md-4">
        <canvas id="pieChart" class="w-50%"></canvas>
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
    new Chart(document.getElementById("barChart"), {
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

    // Datos de docentes por área de conocimiento
    var docentesPorAreaConocimiento = @json($docenteporarea);
    var areasConocimiento = docentesPorAreaConocimiento.map(item => item.nombre);
    var cantidades = docentesPorAreaConocimiento.map(item => item.total);

    // Configurar el gráfico de dona
    new Chart(document.getElementById("donutChart"), {
        type: 'doughnut',
        data: {
            labels: areasConocimiento,
            datasets: [{
                label: "Cantidad de Docentes",
                backgroundColor: ["#FF5733", "#FFBD33", "#33FF57", "#3381FF", "#B833FF"],
                data: cantidades
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Docentes por Área de Conocimiento'
            },
            aspectRatio: 1
        }
    });

    // Datos de asignaturas por área de conocimiento
    var asignaturasPorAreaConocimiento = @json($asignaturasPorAreaConocimiento);
    var pieData = {
        labels: asignaturasPorAreaConocimiento.map(item => item.nombre),
        datasets: [{
            data: asignaturasPorAreaConocimiento.map(item => item.total),
            backgroundColor: ['#FF5733', '#FFBD33', '#33FF57', '#3381FF', '#B833FF'],
        }]
    };
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
    };
    // Crear el gráfico de pastel
    new Chart(document.getElementById("pieChart").getContext('2d'), {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });
</script>
@endsection
