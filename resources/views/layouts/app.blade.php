<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PeaceToy') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/7a36e65912.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-sm navbar-light bg-dark shadow-sm">
        <div class="container-self container" style="max-width: 95%">
            <div class="font-weight-bold logo">
                <a class="navbar-brand" href="{{route('welcome', ['language' => app()->getLocale()])}}">
                    <i class="color-green fas fa-dragon"></i>
                    <span class="color-green logo">Peace</span><span class="text-white logo">Toy</span>
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <?php $currentRoute = Route::current();?>
                <ul class="navbar-nav ml-auto">
                    <div class="language dropdown mr-5">
                    <span
                            data-toggle="dropdown"
                            class="flag-icon flag-icon-{{ Config::get(sprintf('app.supported_locales.%s.flag', app()->getLocale())) }} flag-lg"></span>
                        <img class="language-arrow dropdown-toggle-split" src="/images/toggle.svg"
                             data-toggle="dropdown">
                        <div class="dropdown-menu dropdown-menu-right bg-info">
                            @foreach( Config::get('app.supported_locales') as $key => $locale )
                                <a class="dropdown-item"
                                   href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['language' =>  $key])) }}"><span
                                            class="flag-icon flag-icon-{{ $locale['flag'] }} flag-shadow"></span>
                                    <div class="language-name">{{ __($locale['name']) }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white"
                               href="{{ route('login', ['language' => App::getlocale()]) }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (auth()->user()->admin)
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        {{__('Acces admin')}}
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout', ['language' => App::getlocale()]) }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout', ['language' => App::getlocale() ]) }}"
                                      method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
<div>
    @yield('content')
</div>
</body>
</html>
