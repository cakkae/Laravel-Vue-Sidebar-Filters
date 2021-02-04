<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if (Auth::check())
        <meta name="user-id" content="{{ Auth::user()->id }}">
        <meta name="user-name" content="{{ Auth::user()->name }}">
    @endif
    <title>Proxy - Shop</title>
    <!-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>
<div id="app" class="flex flex-col h-screen justify-between">
<notification></notification>
<navbar></navbar>
<!-- <nav class="relative flex flex-wrap items-center content-between py-3 px-4  bg-blue-600 top-0">
    <div class="container mx-auto sm:px-4">
        <a class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap" href="/">PROXY - WEBSHOP</a>
        <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="px-5 py-1 border border-gray-600 rounded"></span>
        </button>
        <div class="hidden flex-grow items-center" id="navbarSupportedContent">
                    <ul class="flex flex-wrap list-reset pl-0 mb-0 mr-auto">

                    </ul>

                    <ul class="flex flex-wrap list-reset pl-0 mb-0 ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="">
                                    <a class="inline-block py-2 px-4 no-underline" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="">
                                    <a class="inline-block py-2 px-4 no-underline" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="{{ route('home') }}">{{ __('WEBSHOP') }}</a>
                            </li>
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="{{ route('home') }}">{{ __('NOVO U PONUDI') }}</a>
                            </li>
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="{{ route('home') }}">{{ __('AKCIJA') }}</a>
                            </li>
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="{{ route('home') }}">{{ __('KONTAKT') }}</a>
                            </li>
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="{{ route('home') }}">{{ __('PRIJAVA NA NEWSLETTER') }}</a>
                            </li>
                            <li class="">
                                <a id="navbarDropdown" class="inline-block py-2 px-4 no-underline" href="{{ route('home') }}">
                                     <i class="fal fa-user"></i> {{ Auth::user()->name }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
    </div>
</nav> -->

<div id="app">
    @yield('content')
</div>

<!-- <footer class="footer py-5 bg-blue-600">
    <div class="container mx-auto sm:px-4">
        <p class="m-0 text-center text-white">Copyright &copy; ProxyShop {{ date('Y') }}</p>
    </div>
</footer> -->

  <footer class="bg-primary p-4 text-center" style="height: 150px;" >
        <p class="text-center text-white" style="padding-top: 60px;">Copyright &copy; ProxyShop {{ date('Y') }}</p>
  </footer>

</div>

<script src="{{ mix('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
