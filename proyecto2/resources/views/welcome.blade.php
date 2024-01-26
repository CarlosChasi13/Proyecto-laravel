@extends('layouts.guest')
@section('title', __('Welcome'))
@section('content')
<div id="inicio" class="relative isolate m-auto px-6 py-8 lg:px-8 overflow-hidden">
    <img src="https://4.bp.blogspot.com/-ZFyQkIYmGwY/V5V29qwT2AI/AAAAAAAAAFc/A8j6Y-PQVcAgbGMXZntDkDbcBngvQ1j3QCLcB/w1200-h630-p-k-no-nu/edificio.jpg" alt="background" class="absolute inset-0 -z-10 h-full w-full object-none object-left-top lg:object-fill md:object-none" />
    <div class="mx-auto mt-32 max-w-2xl hover:scale-105 duration-500">
        <div class="text-center p-8 bg-gray-500/30 rounded-lg">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{ config('app.full_name', 'Laravel') }}</h1>
            <p class="mt-6 text-lg leading-8 text-gray-200">Plataforma diseñada para facilitar y optimizar la gestión de la enseñanza, centrada en la transmisión efectiva del conocimiento.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ url('/docentes') }}" class="rounded-md bg-blue-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    Conócenos
                </a>
            </div>
        </div>
    </div>
</div>
<div id="nosotros" class="py-16 sm:py-24">
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
<div id="personaldocente" class="m-8">
    <h1 class="font-bold text-gray-900 text-center text-2xl md:text-5xl leading-none mb-8">Personal Docente</h1>
    <hr>
    @if($docentes && $docentes->count() > 0)
        @foreach($docentes as $data)
            <section class="py-4 md:py-8 flex mx-auto items-center container">
                <div class="m-8 px-4 w-1/2">
                    <div class="text-center">
                        <div class="flex justify-center m-8">
                            <img class="rounded-full w-32 h-32" src="https://img.freepik.com/foto-gratis/chico-guapo-seguro-posando-contra-pared-blanca_176420-32936.jpg?size=626&ext=jpg&ga=GA1.1.1412446893.1705795200&semt=sph" alt="Imagen Docente">
                        </div>
                        <h1 class="font-normal text-gray-900 text-xl md:text-4xl leading-none mb-8">
                            {{ $data['docente']->nombre }} {{ $data['docente']->apellido }}
                        </h1>
                        @if($data['titulo'])
                            <h6 class="font-medium text-gray-600 text-base md:text-xl uppercase mb-8">
                                {{ $data['titulo']->nombre_titulo }}
                            </h6>
                        @else
                            <h6 class="font-medium text-gray-600 text-base md:text-xl uppercase mb-8">
                                No tiene un titulo registrado
                            </h6>
                        @endif
                        <p class="font-normal text-gray-600 text-md md:text-base my-8">
                            {{ $data['docente']->acercade }}
                        </p>
                        <a href="#" class="px-7 py-3 md:px-9 md:py-4 font-medium md:font-semibold bg-gray-700 text-gray-50 text-sm rounded-md hover:bg-gray-50 hover:text-gray-700 transition ease-linear duration-500">Obtén mi CV</a>
                    </div>
                </div>
                <div class="m-8 px-4 w-1/2">
                    <h1 class="font-bold text-gray-700 text-xl md:text-2xl mb-5">Formación Académica</h1>
                    <hr>
                    <div class="flex flex-col gap-4 m-4">
                        @if($data['capacitaciones'] && $data['capacitaciones']->count() > 0)
                            @foreach($data['capacitaciones'] as $capacitacion)
                                <div class="bg-gray-50 px-4 py-2 rounded-md">
                                    <label for="experience" class="font-normal text-gray-500 text-md">{{ $capacitacion->titulo }}</label>
                                </div>
                            @endforeach
                        @else
                            <div class="bg-gray-50 px-4 py-2 rounded-md">
                                <label for="experience" class="font-normal text-gray-500 text-md">No tiene capacitaciones registradas</label>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <hr>
        @endforeach
    @else
        <section class="py-4 md:py-8 flex mx-auto items-center container">
            <h1>No hay datos</h1>
        </section>
        <hr>
    @endif
</div>
<div id="contactanos" class="flex flex-wrap justify-center items-center px-6 py-24 sm:py-16 lg:px-8">
    <div class="mx-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contáctanos</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Estamos aquí para ayudarte.</p>
        </div>
        <form action="#" method="POST" class="mx-auto mt-8 max-w-xl sm:mt-12">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Nombre</label>
                    <div class="mt-2.5">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Apellido</label>
                    <div class="mt-2.5">
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                    <div class="mt-2.5">
                        <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Número de contacto</label>
                    <div class="relative mt-2.5">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <label for="País" class="sr-only">País</label>
                            <select id="País" name="País" class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                <option>EC</option>
                            </select>
                            <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="asunto" class="block text-sm font-semibold leading-6 text-gray-900">Asunto</label>
                    <div class="mt-2.5">
                        <input type="text" name="asunto" id="asunto" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Mensaje</label>
                    <div class="mt-2.5">
                        <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
                <div class="flex gap-x-4 sm:col-span-2">
                    <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
                        Al enviar la solicitud, aceptas nuestros
                        <a href="#" class="font-semibold text-indigo-600">Términos y Condiciones</a> sobre el manejo de información de tus datos.
                    </label>
                </div>
            </div>
            <div class="mt-10">
                <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Contáctame</button>
            </div>
        </form>
    </div>
    @if($campus)
        <div class="mx-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Visítanos</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">{{ $campus->nombre }}</p>
                <p class="mt-2 text-lg leading-8 text-gray-600">{{ $campus->provinciaop->nombre }} - {{ $campus->paisop->nombre }}</p>
            </div>
            <iframe class="m-4" src="{{ $campus->maps_url }}" width="750" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @endif
</div>
@endsection