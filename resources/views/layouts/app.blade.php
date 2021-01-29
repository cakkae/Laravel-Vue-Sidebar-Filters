<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if (Auth::check())
        <meta name="user-id" content="{{ Auth::user()->id }}">
    @endif
    <title>Proxy - Shop</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">PROXY - WEBSHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('WEBSHOP') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('NOVO U PONUDI') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('AKCIJA') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('KONTAKT') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('PRIJAVA NA NEWSLETTER') }}</a>
                            </li>
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('home') }}">
                                     <i class="fal fa-user"></i> {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
    </div>
</nav>

<div id="app">
    @yield('content')
</div>

<footer class="footer py-5 bg-primary">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; ProxyShop {{ date('Y') }}</p>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
