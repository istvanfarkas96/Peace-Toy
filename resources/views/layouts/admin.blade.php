<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

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

<div class="app-body">
    <div class="row sidebar">
        <div class="col-md-2 bg-dark">
            <a class="d-flex justify-content-center pt-4 text-decoration-none" href="{{route('admin.dashboard')}}">
                <i class="color-green fas fa-dragon"></i>
                <span class="color-green logo">Peace</span><span class="text-white logo">Toy</span>
            </a>
            <ul class="navbar-nav text-center pl-2">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link text-white text-center dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown">
                        @if (auth()->user()->admin)
                            <a class="dropdown-item"
                               href="{{ route('welcome', ['language' => App::getlocale()]) }}">
                                {{__('Back to public page')}}
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout', ['language' => App::getlocale()]) }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout', ['language' => App::getlocale()]) }}"
                              method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

            <nav class="sidebar-nav m-4">
                <ul class="sidebar-list list-unstyled text-center">
                    <li class="pt-3 border-bottom">
                        <a href="{{ route('admin.users') }}" class="text-decoration-none">{{__('Users')}}</a>
                    </li>

                    <li class="pt-3 border-bottom">
                        <a href="{{ route('admin.videos') }}" class="text-decoration-none">{{ __('Videos') }}</a>
                    </li>

                    <li class="pt-3 border-bottom">
                        <a href="{{ route('admin.reviews') }}" class="text-decoration-none">{{ __('Reviews') }}</a>
                    </li>

                </ul>
            </nav>
        </div>

        <div class="col-md-10 bg-info p-3">
            @include('layouts._flash')
            @yield('content')
        </div>
    </div>
</div>


</body>
</html>