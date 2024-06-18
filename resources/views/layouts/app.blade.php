<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- estilos del sidebar  --}}
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">

    {{-- estilos externos --}}
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/sidebar.js'])


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Restaurant los primos
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name . ' ' . Auth::user()->surname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
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
        {{-- sidebar --}}

        <div class="wrapper">
            @if (Auth::User())
                <aside id="sidebar">
                    <div class="d-flex">
                        <button class="toggle-btn" type="button">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="{{ route('menu.index') }}" class="sidebar-link">
                                <i class="fa-solid fa-cash-register"></i>
                                <span>Menus</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="lni lni-agenda"></i>
                                <span>Task</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                                <i class="lni lni-protection"></i>
                                <span>Auth</span>
                            </a>
                            <ul id="auth" class="sidebar-dropdown list-unstyled collapse"
                                data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Login</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Register</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                                <i class="lni lni-layout"></i>
                                <span>Multi Level</span>
                            </a>
                            <ul id="multi" class="sidebar-dropdown list-unstyled collapse"
                                data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                        Two Links
                                    </a>
                                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a href="#" class="sidebar-link">Link 1</a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="#" class="sidebar-link">Link 2</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="lni lni-popup"></i>
                                <span>Notification</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('user.index') }}" class="sidebar-link">
                                <i class="lni lni-cog"></i>
                                <span>Ajustes de usuario</span>
                            </a>
                        </li>
                    </ul>
                    <div class="sidebar-footer">
                        <a href="#" class="sidebar-link">
                            <i class="lni lni-exit"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </aside>
            @endif
            <main class="container">
                @yield('content')
            </main>
        </div>

    </div>




</body>

</html>
