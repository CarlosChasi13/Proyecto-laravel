<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body>
<<<<<<< HEAD
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth()
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                CRUDs
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/nrc') }}">Nrc</a></li>
<<<<<<< HEAD
=======
                                <li><a class="dropdown-item" href="{{ url('/areasconocimientos') }}">Áreas Conocimiento</a></li>
                                <li><a class="dropdown-item" href="{{ url('/areasconocimientosopciones') }}">Áreas Conocimiento-opciones</a></li>
                                <li><a class="dropdown-item" href="{{ url('/campus') }}">Campus</a></li>
>>>>>>> 69430cfd37a34485ab36f754f3e2e22d3235094d
                                <li><a class="dropdown-item" href="{{ url('/materias') }}">Materias</a></li>
                                <li><a class="dropdown-item" href="{{ url('/rol') }}">Rol</a></li>
                                <li><a class="dropdown-item" href="{{ url('/rolopciones') }}">Rol-opciones</a></li>
                                <li><a class="dropdown-item" href="{{ url('/responsabilidad') }}">Responsabilidad</a></li>
                                <li><a class="dropdown-item" href="{{ url('/responsabilidadopciones') }}">Responsabilidad opciones</a></li>
                                <li><a class="dropdown-item" href="{{ url('/nrcs') }}">NRCs</a></li>
                                <li><a class="dropdown-item" href="{{ url('/areainteres') }}">Áreas de Interés</a></li>
                                <li><a class="dropdown-item" href="{{ url('/publicacioncientificas') }}">Publicaciones Científicas</a></li>
                                <li><a class="dropdown-item" href="{{ url('/capacitacions') }}">Capacitaciones</a></li>
                                <li><a class="dropdown-item" href="{{ url('/experiencialaborals') }}">Experiencia Laboral</a></li>
                                <li><a class="dropdown-item" href="{{ url('/titulos') }}">Títulos</a></li>
                                <li><a class="dropdown-item" href="{{ url('/docente') }}">Docentes</a></li>
                                <li><a class="dropdown-item" href="{{ url('/periodosacademicos') }}">Periodos Académicos</a></li>
                                <li><a class="dropdown-item" href="{{ url('/cursos') }}">Cursos</a></li>
                                <li><a class="dropdown-item" href="{{ url('/departamentos') }}">Departamentos</a></li>
                                <li><a class="dropdown-item" href="{{ url('/campus') }}">Campus</a></li>
                                <li><a class="dropdown-item" href="{{ url('/rolopciones') }}">RolOpciones</a></li>
                                <li><a class="dropdown-item" href="{{ url('/areadeconocimiento') }}">Area de Conocimientos</a></li>
                                
                            </ul>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Opciones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('/responsabilidadopciones') }}">Responsabilidades</a></li>
                                <li><a class="dropdown-item" href="{{ url('/areasconocimientosopciones') }}">Áreas Conocimiento</a></li>
                            </ul>
                        </li>
                        <!--Nav Bar Hooks - Do not delete!!-->
						
						
						
                    </ul>
                    @endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
=======
>>>>>>> 5c9de0ab08d1111aa4f472e80291b0aa210fd56c
    @livewireScripts
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
            addModal.hide();
            editModal.hide();
        })
    </script>
</body>

</html>

