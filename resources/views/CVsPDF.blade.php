<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Currículum</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F0F0F0;
        }

        .img-proyecto {
            width: 200px;
        }

        .img-espe {
            width: 100px;
        }

        .docente-info {
            display: flex;
            align-items: center;
        }

        .docente-info img {
            border-radius: 50%;
            margin-right: 20px;
        }

        .docente-info h2 {
            margin-bottom: 0;
        }

        .section-heading {
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .section-heading h3 {
            margin-bottom: 10px;
        }

        .section-content {
            margin-bottom: 40px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
        <div class="text-center p-3 container">
            <!-- Logo de la ESPE -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Logo_ESPEOk.png/250px-Logo_ESPEOk.png"
                alt="Logo ESPE" class="mb-3 img-espe rounded float-left">
            <!-- Logo del proyecto -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-WeYvDLfMleMomRRM96IhTnLKyaHVpdlgbxIFAMFkQHXlo7dS72-Phikg4XuEKx3u2w&usqp=CAU"
                alt="Logo Proyecto" class="mb-3 img-proyecto rounded float-right">
        </div>
            <div class="col-md-6 text-center">
                <h1 class="mt-4">Currículum</h1>
            </div>

        </div>
        <hr>

        <!-- Datos del Docente -->
        <div class="section-heading">
            <h3>Datos del Docente</h3>
        </div>
        <div class="docente-info">
        @if ($titulos->first()->docente->foto_personal)
            <img src="{{ $titulos->first()->docente->foto_personal }}" alt="Foto del Docente" style="width: 200px;">
        @else
            <img class="w-6" src="data:image/jpeg;base64,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" alt="graduation-cap" style="width: 200px;">
        @endif

            <div>
                <h2>{{ $titulos->first()->docente->nombre }} {{ $titulos->first()->docente->apellido }}</h2>
                <p>{{ $titulos->first()->docente->email }}</p>
                <p>{{ $titulos->first()->docente->telefono }}</p>
            </div>
        </div>

        <!-- Títulos -->
        <div class="section-heading">
            <h3>Títulos</h3>
        </div>
        <div class="section-content">
            <ul>
                @foreach ($titulos as $titulo)
                <li>{{ $titulo->nombre }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Capacitaciones -->
        <div class="section-heading">
            <h3>Capacitaciones</h3>
        </div>
        <div class="section-content">
            <ul>
                @foreach ($capacitaciones as $capacitacion)
                <li>{{ $capacitacion->nombre }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Experiencia Laboral -->
        <div class="section-heading">
            <h3>Experiencia Laboral</h3>
        </div>
        <div class="section-content">
            <ul>
                @foreach ($experiencias as $experiencia)
                <li>{{ $experiencia->cargo }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Áreas de Interés -->
        <div class="section-heading">
            <h3>Áreas de Interés</h3>
        </div>
        <div class="section-content">
            <ul>
                @foreach ($areasinteres as $area)
                <li>{{ $area->tema }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Pie de Página -->
        <footer class="fixed-bottom">
            <div class="container">
                <p class="text-center font-light small">Fecha de impresión: {{ $date }}</p>
            </div>
        </footer>
    </div>
</body>

</html>
