@extends('layouts.guest')
@section('title', __('Docentes'))
@section('content')
<div class="m-8">
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
@endsection