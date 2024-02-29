<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Materias PDF</title>
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .img-proyecto {
            width: 400px;
        }

        .img-espe {
            width: 100px;
        }
        h1 {
            font-size: 40px;
            font-weight: bold;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilos para el pie de página */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        footer p {
            margin: 0;
        }

    </style>
</head>

<body>
    <div >

        <div class="text-center p-3 container">
            <!-- Logo de la ESPE -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Logo_ESPEOk.png/250px-Logo_ESPEOk.png"
                alt="Logo ESPE" class="mb-3 img-espe rounded float-left">
            <!-- Logo del proyecto -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-WeYvDLfMleMomRRM96IhTnLKyaHVpdlgbxIFAMFkQHXlo7dS72-Phikg4XuEKx3u2w&usqp=CAU"
                alt="Logo Proyecto" class="mb-3 img-proyecto rounded float-right">
        </div>
        <br>
        <br>
        <br>
        <hr>

        <h1 class="text-center">{{ $title }}</h1>

        <br>
        <p class="">Total de Materias: {{ $totalMaterias }}</p>
        <br>
        <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Materia</th>
            <th scope="col">Área de Conocimiento</th>
            <th scope="col">Horas Teoría</th>
            <th scope="col">Horas Laboratorio</th>
            <th scope="col">Horas Otros</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($materias as $materia)
            <tr>
                <td>{{ $materia->codigo }}</td>
                <td>{{ $materia->codigoareaconocimiento-> areaconocimiento->nombre}}</td>
                <td>{{ $materia->nombre }}</td>
                <td>{{ $materia->horas_teoria }}</td>
                <td>{{ $materia->horas_laboratorio }}</td>
                <td>{{ $materia->horas_otros }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


    </div>

    <footer class="fixed-bottom">
        <div class="container">
            <p class="text-center font-light small">Fecha de impresión: {{ $date }}</p>
        </div>
    </footer>
</body>

</html>
