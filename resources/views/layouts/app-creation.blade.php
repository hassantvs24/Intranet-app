<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('script')

</head>
<body class="@yield('body-class')">
<div class="container">


<div class="admin-wrapper">

    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="site-header">
            <div class="container-fluid">
                <div class="navbar-brand d-inline-flex align-items-center align-content-center">
                    <label for="search-full" class="font-weight-bold pr-4">{{ __( 'Search' ) }}</label>
                    <input type="search" id="search-full" class="form-control" placeholder="{{ __('search everything') }}">
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                @include('components.language')

                <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login', app()->getLocale() ) }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register', app()->getLocale() ) }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin-home', app()->getLocale()) }}">
                                        {{ __('Dashboard') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('admin-account-settings', app()->getLocale()) }}">
                                        {{ __('Settings') }}
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout', app()->getLocale() ) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout', app()->getLocale() ) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0 px-2 mb-5">
            @yield('admin-content')
        </main>
    </div>

</div>
</div>

<div id="credits" style="display: none">
    <a href="https://iconscout.com/icons/dashboard" target="_blank">Dashboard Icon</a> by <a href="https://iconscout.com/contributors/google-inc">Google Inc.</a> on <a href="https://iconscout.com">Iconscout</a>
    <a href="https://iconscout.com/icons/people" target="_blank">People Icon</a> by <a href="https://iconscout.com/contributors/fluent">Microsoft</a> on <a href="https://iconscout.com">Iconscout</a>
    <a href="https://iconscout.com/icons/user" target="_blank">User Icon</a> by <a href="https://iconscout.com/contributors/kawalanicon">Kawalan Icon</a> on <a href="https://iconscout.com">Iconscout</a>
    <a href="https://iconscout.com/icons/view" target="_blank">View Icon</a> by <a href="https://iconscout.com/contributors/denimao" target="_blank">Deni Maolana</a>
</div>
</body>
</html>
