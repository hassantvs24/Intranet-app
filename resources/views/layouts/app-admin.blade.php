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
    <link href="{{ asset('css/admin.css?v=') }}" rel="stylesheet">

    @yield('script')
</head>
<body class="@yield('body-class')">
    <div class="admin-wrapper d-flex flex-wrap">
        {{-- START left col --}}
        <div id="sidebar">
            <a href="{{ route('admin-home', app()->getLocale() ) }}" class="sidebar-header d-flex">
                <img src="{{ asset('/images/logo-white.png') }}" alt="Intranet Air Logo" height="40" />
            </a>

            <div class="sidebar-content">
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('admin-home', app()->getLocale() ) }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/dashboard.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Dashboard') }}</div>
                    </a>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-groups', app()->getLocale() ) }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/users.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Groups') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('groups.create', app()->getLocale() ) }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Group') }}</a>

                        <a href="{{ route('all-groups', app()->getLocale() ) }}" class="submenu-item text-light d-block pl-4">{{ __('All Groups') }}</a>
                        <!--<a href="{{ route('create-group', app()->getLocale() ) }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Group') }}</a>-->
                        <a href="{{ route('archived-groups', app()->getLocale() ) }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Groups') }}</a>

                        <!-- Created by nazmul -->
                        <!--<a href="{{ route('creation', app()->getLocale() ) }}" class="submenu-item text-light d-block pl-4">{{ __('Creation') }}**</a>-->
                        <!-- Created by nazmul -->
                    </div>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-boards', app()->getLocale() ) }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/boards.svg')}}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Info Boards') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-boards', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('All Boards') }}</a>
                        <a href="{{ route('create-board', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Board') }}</a>
                        <a href="{{ route('archived-boards', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Boards') }}</a>
                    </div>
                </div>
                {{-- END menu item --}}
                @if( auth()->user()->role == 'admin' )
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-admins', app()->getLocale() ) }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/user.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Admins') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-admins', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('All Admins') }}</a>
                        <a href="{{ route('create-admin', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Admin') }}</a>
                        <a href="{{ route('archived-admins', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Admins') }}</a>
                    </div>
                </div>
                {{-- END menu item --}}
                @endif;
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-users', app()->getLocale()) }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/user.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Users') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-users', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('All Users') }}</a>
                        <a href="{{ route('create-user', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('Add New User') }}</a>
                        <a href="{{ route('archived-users', app()->getLocale()) }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Users') }}</a>
                    </div>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{-- route('media-library') --}}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/files.svg') }}" alt="media icon">
                        </div>
                        <div class="text text-light">{{ __('Files & Images') }}</div>
                    </a>

                    {{-- <div class="submenu pl-5">
                        <a href="{{ route('all-users') }}" class="submenu-item text-light d-block pl-4">{{ __('All Users') }}</a>
                        <a href="{{ route('create-user') }}" class="submenu-item text-light d-block pl-4">{{ __('Add New User') }}</a>
                        <a href="{{ route('archived-users') }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Users') }}</a>
                    </div> --}}
                </div>
                {{-- END menu item --}}
            </div>
        </div>
        {{-- END left col --}}

        {{-- START right col --}}
        <div id="app">
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
        {{-- END right col --}}
    </div>

    @include('components.credits')
</body>
</html>
