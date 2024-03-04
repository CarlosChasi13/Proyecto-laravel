<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bienvenido | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body>
    <header class="relative z-50 flex flex-wrap w-full py-4 text-sm bg-white sm:justify-start sm:flex-nowrap dark:bg-gray-800">
        <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex items-center text-xl font-semibold bg-blue-500 rounded-lg pe-6 dark:text-white hover:bg-blue-700" href="{{ url('/') }}">
                    <img class="h-12 pe-4" src="img\logo.png" alt="Logo">
                    <label class="pointer-events-none" for="name">{{ config('app.name', 'Laravel') }}</label>
                </a>
                <div class="sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm hs-collapse-toggle gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-with-mega-menu" aria-controls="navbar-with-mega-menu" aria-label="Toggle navigation">
                        <svg class="flex-shrink-0 w-4 h-4 hs-collapse-open:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="flex-shrink-0 hidden w-4 h-4 hs-collapse-open:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-with-mega-menu" class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:block">
                <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                    <a class="font-medium text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/" aria-current="page">
                        Inicio
                    </a>
                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#personaldocente">
                        Personal Docente
                    </a>
                    <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#contactanos">
                        Contáctanos
                    </a>
                    <div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none]">
                        <button id="hs-mega-menu-basic-dr" type="button" class="flex items-center w-full font-medium text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 ">
                            @auth()
                            <label class="text-gray-800 dark:text-slate-300">Bienvenido, <b>{{ Auth::user()->name }}</b>!</label>
                            @else
                            <span class="text-gray-800 dark:text-slate-300">Cuenta</span>
                            @endauth
                            <svg class="flex-shrink-0 w-4 h-4 ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 bg-white sm:shadow-md rounded-lg p-2 dark:bg-gray-800 sm:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5 hidden">
                            @guest
                            @if (Route::has('login'))
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ url('admin/login') }}">
                                Iniciar Sesión
                            </a>
                            @endif
                            @else
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ url('admin') }}">
                                Administración
                            </a>
                            <hr>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endguest
                        </div>
                    </div>`
                </div>
            </div>
        </nav>
    </header>
    <div class="font-sans antialiased text-gray-900">
        <img src="img\Logo_ESPE.png" alt="background" class="fixed inset-0 w-1/2 m-auto pointer-events-none select-none -z-10 opacity-5" />
        @yield('content')
    </div>
    <footer class="bg-white dark:bg-gray-900">
        <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex items-center mb-4 space-x-3 pointer-events-none select-none sm:mb-0 rtl:space-x-reverse">
                    <img src="img\logo.png" class="w-16 bg-blue-500 rounded-md" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.full_name', 'Laravel') }}</span>
                </div>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Términos y Condiciones</a>
                    </li>
                    <li>
                        <a href="{{ url('/contactanos') }}" class="hover:underline">Contáctanos</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <label class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <span>{{ config('app.name', 'Laravel') }}</span>. Todos los derechos reservados.</label>
        </div>
    </footer>
</body>

</html>
