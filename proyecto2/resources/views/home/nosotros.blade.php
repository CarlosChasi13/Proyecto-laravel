@extends('layouts.guest')
@section('title', __('Nosotros'))
@section('content')
<div class="py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto lg:text-center">
            <div class="flex flex-wrap items-center justify-between">
                <img class="w-32" src="img\softwarelogo.png" alt="Software">
                <p class="w-fit mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Departamento de Ciencias de la Computación</p>
                <img class="w-32" src="img\Logo_ESPE.png" alt="ESPE">
            </div>
            <p class="mt-6 text-lg leading-8 text-gray-600 text-justify">
                El Departamento de Ciencias de la Computación de la Universidad de las Fuerzas Armadas ESPE Sede Latacunga, está ubicado en la ciudad de Latacunga, capital de la provincia de Cotopaxi; en el Campus General Guillermo Rodríguez Lara en la parroquia Belisario Quevedo.
            </p>
            <p class="mt-6 text-lg leading-8 text-gray-600 text-justify">
                Creado mediante resolución ESPE-HCU-RES-2021-073 de fecha 06 de septiembre de 2021, está integrado por el programa de Grado de la “Carrera de Ingeniería de Software” y por el programa de Posgrado de la “Maestría de Ingeniería en Software”, éste último se ejecuta desde él año 2008.
            </p>
            <p class="mt-6 text-lg leading-8 text-gray-600 text-justify">
                El Departamento de Ciencias de la Computación cuenta en la actualidad con 27 docentes, de los cuales 10 son Tiempo Completo, 7 docentes Tiempo Parcial y 5 docentes Tiempo Completo Ocasional, los mismos que prestan su contingente a las diversas carreras de Ingeniería y Ciencias Administrativas de la Sede Latacunga; cuenta con 3 docentes Tiempo Completo Ocasional y 2 Medio Tiempo Ocasional, que contribuyen con su trabajo en la Sección de Tecnologías.
            </p>
            <p class="mt-6 text-lg leading-8 text-gray-600 text-justify">
                Cuenta con 5 laboratorios especializados y 1 laboratorio que presta servicio a las diferentes carreras, así como para las necesidades internas e instituciones externas.
            </p>
            <p class="mt-6 text-lg leading-8 text-gray-600 text-justify">
                El departamento cuenta con 3 Doctores PHD en el área de Software.
            </p>
        </div>
        <div class="mx-auto mt-16">
            <dl class="flex flex-wrap">
                <div class="relative pl-16 w-1/2">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg">
                            <img width="64" height="64" src="https://img.icons8.com/nolan/64/goal.png" alt="goal"/>
                        </div>
                        <span class="font-bold text-2xl">Misión</span>
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">
                        Formar profesionales e investigadores de excelencia, creativos, humanistas, con capacidad de liderazgo, pensamiento crítico y alta conciencia ciudadana; generar y aplicar el conocimiento científico; y transferir tecnología, en el ámbito de sus dominios académicos, para contribuir con el desarrollo nacional y atender las necesidades de la sociedad y de las Fuerzas Armadas.
                    </dd>
                </div>
                <div class="relative pl-16 w-1/2">
                    <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg">
                            <img width="64" height="64" src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/external-vision-teamwork-wanicon-lineal-color-wanicon.png" alt="external-vision-teamwork-wanicon-lineal-color-wanicon"/>
                        </div>
                        <span class="font-bold text-2xl">Visión</span>
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-gray-600">
                        La Universidad de las Fuerzas Armadas- ESPE es reconocida, como un referente a nivel nacional y regional por su contribución en el ámbito de sus dominios académicos, al fortalecimiento de la Seguridad y la Defensa, bajo un marco de valores éticos, cívicos y de servicio a la comunidad.
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection