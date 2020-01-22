<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fab fa-laravel"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Contact</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="" class="dropdown-item">
                                        Profile
                                    </a>
                                    <a href="" class="dropdown-item">
                                        Purchase history
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="container my-5">
                <div class="alert alert-danger">
                    <h3>Please, read this!</h3>
                    <p>For a while, I'm using the same controllers and pages to handle requests from common and
                        admin users, but that will change in the future. So anything that has a red color
                        like this alert will probably be removed!</p>
                </div>
            </div>

            @yield('content')
        </main>

        <footer class="bg-dark">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-4 offset-1 links">
                        <ul>
                            <li>
                                <a href="{{ route('products.index') }}">Products</a>
                            </li>
                            <li>
                                <a href="">Contact</a>
                            </li>
                            <li>
                                <a href="">About</a>
                            </li>
                            <li>
                                <a href="">FAQ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="row justify-content-center">
                            <h4>Newsletter</h4>
                        </div>
                        <div class="row justify-content-center my-2">
                            <form action="" class="form-inline">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email address">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-light">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row justify-content-center social">
                            <a href="" class="icon fb">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="" class="icon tw">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="" class="icon ig">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container py-4 text-secondary">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h5>Copyright &copy; {{ date('Y') }}, All rights reserved</h5>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ url(mix('js/jquery.js')) }}"></script>
    <script src="{{ url(mix('js/bootstrap.js')) }}"></script>
    <script src="{{ url(mix('js/app.js')) }}"></script>
</body>
</html>
