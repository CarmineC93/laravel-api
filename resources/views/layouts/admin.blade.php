<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Project</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div style="height: 100vh" class="bg-dark">
        {{-- Header --}}
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow"
            style="border-bottom: 1px solid white; height: 50px">
            <div class="row justify-content-between">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
                    <em>MyProjects</em> </a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            {{-- logout --}}
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ms-2">
                    <a class="nav-link text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            {{-- /logout --}}

        </header>
        {{-- /Header --}}

        <div class="container-fluid bg-dark">

            <div class="row " style="height: calc(100% - 50px)">
                {{-- Sidebar --}}
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse"
                    style="border-right: 1px solid white; scroll:auto;">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                {{-- impostiamo sui link una classe dinamica in base alla rotta corrente --}}
                                <a class="nav-link text-white {{ Route::currentRouteName() === 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() === 'admin.projects.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.projects.index') }}">
                                    <i class="fa-solid fa-list"></i>
                                    Projects
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() === 'admin.types.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.types.index') }}">
                                    <i class="fa-solid fa-folder"></i>
                                    Types
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() === 'admin.technologies.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.technologies.index') }}">
                                    <i class="fa-solid fa-microchip"></i>
                                    Technologies
                                </a>
                            </li>


                        </ul>
                    </div>
                </nav>
                {{-- /Sidebar --}}

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="scroll:auto">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
