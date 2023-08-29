<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid vh-100">
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="#sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse data-bs-auto-close">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                {{Route::currentRouteName()}}
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : ''}}" href="{{route('admin.dashboard')}}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                {{Route::currentRouteName()}}
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-secondary' : ''}}" href="{{route('admin.projects.index')}}">
                                    <i class="fas fa-list fa-lg fa-fw"></i> Projects
                                </a>
                            </li>
                            <li class="nav-item">
                                {{Route::currentRouteName()}}
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-secondary' : ''}}" href="{{route('admin.types.index')}}">
                                    <i class="fas fa-list fa-lg fa-fw"></i> Project types
                                </a>
                            </li>
                            <li class="nav-item">
                                {{Route::currentRouteName()}}
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.technologies.index' ? 'bg-secondary' : ''}}" href="{{route('admin.technologies.index')}}">
                                    <i class="fas fa-list fa-lg fa-fw"></i> Technologies
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
