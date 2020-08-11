<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('User Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
                            </li>
                            @if (Route::has('admin.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Admin Register') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('faculty.login') }}">{{ __('Faculty Login') }}</a>
                            </li>
                            @if (Route::has('faculty.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('faculty.register') }}">{{ __('Faculty Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            {{__('Admin dashboard')}}
                                        </a>

                                        <a class="dropdown-item" href="{{ route('admin.password.change') }}">
                                            {{__('Change password')}}
                                        </a>

                                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('admin-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @elseif(\Illuminate\Support\Facades\Auth::guard('faculty')->check())
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('faculty.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('faculty-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="faculty-logout-form" action="{{ route('faculty.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('user-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endif
                            </li>
{{--                            <li>--}}
{{--                                @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())--}}
{{--                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                        <a class="dropdown-item" href="{{ route('admin.password.change') }}">{{__('Change password')}}</a>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </li>--}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
