@extends('layouts.guest')
@section('title', __('Welcome'))
@section('content')
<img src="https://4.bp.blogspot.com/-ZFyQkIYmGwY/V5V29qwT2AI/AAAAAAAAAFc/A8j6Y-PQVcAgbGMXZntDkDbcBngvQ1j3QCLcB/w1200-h630-p-k-no-nu/edificio.jpg" alt="background" class="absolute inset-0 -z-10 h-full w-full object-none object-left-top lg:object-fill md:object-none" />
<div class="relative isolate px-6 pt-8 lg:px-8 overflow-hidden">
    <div class="mx-auto mt-32 max-w-2xl hover:scale-105 duration-500">
        <div class="text-center p-8 bg-gray-500/30 rounded-lg">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Gestor de Docencia Orientada al Conocimiento</h1>
            <p class="mt-6 text-lg leading-8 text-gray-200">Plataforma diseñada para facilitar y optimizar la gestión de la enseñanza, centrada en la transmisión efectiva del conocimiento.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-blue-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    Conócenos
                </a>
            </div>
        </div>
    </div>
</div>
@endsection