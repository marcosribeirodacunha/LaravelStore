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

    <!-- Styles -->
    <link href="{{ url(mix('css/admin.css')) }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    <div id="admin">
        <aside id="sidebar">
            <div class="brand">
                <a href="#">
                    <i class="fab fa-laravel"></i>
                    LaravelStore
                </a>
            </div>
            <nav class="menu">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                           class="{{ strpos(Route::currentRouteName(), 'admin.dashboard') === 0 ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}"
                           class="{{ strpos(Route::currentRouteName(), 'admin.products') === 0 ? 'active' : ''}}">
                            <i class="fas fa-box-open"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>
                    </li><li>
                        <a href="#">
                            <i class="fas fa-user"></i>
                            <span>Clients</span>
                        </a>
                    </li><li>
                        <a href="#">
                            <i class="fas fa-receipt"></i>
                            <span>Anything else</span>
                        </a>
                    </li><li>
                        <a href="#">
                            <i class="fas fa-money-bill-wave"></i>
                            <span>Another one</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main id="main" class="w-100">

            <header id="header" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="#" class="menu-button">
                    <i class="fas fa-bars"></i>
                </a>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>{{ Auth::user()->name ?? 'Username' }}</span>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTa90AN6zwbSHx3qXM8wX0j5gWV4Ny9HlhJlC52lZrTZdNuGd5INQ&s" alt="User image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            @guest
                                <a class="dropdown-item" href="#">Logout</a>
                            @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                        $('#form-logout').submit();">
                                    Logout
                                </a>

                                <form id="form-logout" action="{{ route('logout') }}" method="post" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </li>
                </ul>
            </header>

            <div id="content">
                @yield('content')
            </div>
        </main>
    </div>

    @yield('modal')


    <script src="{{ url(mix('js/jquery.js')) }}"></script>
    <script src="{{ url(mix('js/bootstrap.js')) }}"></script>
    <script src="{{ url(mix('js/admin.js')) }}"></script>

    @stack('scripts')

    {{-- Code to enable BrowserSync --}}
    @if (getenv('APP_ENV') === 'local')
        <script id="__bs_script__">//<![CDATA[
            document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
            //]]>
        </script>
    @endif
</body>
</html>
