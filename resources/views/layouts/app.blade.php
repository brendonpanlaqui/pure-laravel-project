<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOFENG2') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-md bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-dark" href="{{ url('/') }}">
                    {{ config('app.name', 'SOFENG2') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Post') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Apply') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="{{ route('register') }}">{{ __('Join') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- Admin Dashboard Link (Visible Only to Admins) -->
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                </li>
                            @endif

                            <!-- Employer Dashboard (Visible Only to Employers) -->
                            @if (Auth::check() && Auth::user()->role === 'employer')
                                <li class="nav-item">
                                    <a class="nav-link text-danger" href="{{ route('jobs.create') }}">{{ __('Post') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('employer.dashboard') }}" class="nav-link text-dark">Employer Dashboard</a>
                                </li>
                            @endif
                            <!-- Worker Dashboard (Visible Only to Workers) -->
                            @if (Auth::check() && Auth::user()->role === 'worker')
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('worker.dashboard') }}">{{ __('Worker Dashboard') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('profile.index') }}">{{ __('Profile') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
