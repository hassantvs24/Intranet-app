<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body class="@yield('body-class')">
    <div class="admin-wrapper d-flex flex-wrap">
        {{-- START left col --}}
        <div id="sidebar">
            <a href="{{ route('admin-home') }}" class="sidebar-header d-flex">
                <svg width="135" height="28" viewBox="0 0 135 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.99 22.759L2.05 10.384C0.232001 9.12998 0.850002 6.51898 3.117 5.90498L22.184 0.729984C22.5879 0.584243 23.0207 0.536934 23.4466 0.591984C23.8724 0.647034 24.279 0.802854 24.6326 1.04651C24.9861 1.29017 25.2765 1.61464 25.4795 1.99299C25.6825 2.37134 25.7924 2.79266 25.8 3.22198L24.67 20.771C24.536 22.854 21.808 24.013 19.99 22.759Z" fill="#E9327C"/>
                    <path d="M14.3 25.814L3.73101 5.14498C3.48942 4.67214 3.3831 4.14175 3.42379 3.61232C3.46448 3.08289 3.6506 2.57498 3.96162 2.14461C4.27263 1.71424 4.69646 1.37812 5.18637 1.17332C5.67628 0.968521 6.21323 0.903002 6.73801 0.983984L26.325 4.00698C26.776 4.07659 27.204 4.25224 27.5738 4.51949C27.9436 4.78674 28.2448 5.13797 28.4524 5.54428C28.6601 5.95059 28.7683 6.40038 28.7682 6.85668C28.7682 7.31297 28.6598 7.76273 28.452 8.16898L19.429 25.815C19.1867 26.2865 18.8191 26.682 18.3666 26.9582C17.9142 27.2343 17.3943 27.3804 16.8642 27.3803C16.3341 27.3802 15.8143 27.2339 15.3619 26.9576C14.9095 26.6813 14.5421 26.2856 14.3 25.814V25.814Z" fill="#1dace3"/>
                    <path d="M25.752 3.91801L15.988 2.41101L4 5.66601L8.785 15.027L19.99 22.759C20.2372 22.9277 20.5091 23.0569 20.796 23.142L25.052 14.819L25.752 3.91801Z" fill="#001a49"/>
                    <path d="M75.209 6.33399C75.209 5.97106 75.3166 5.61629 75.5182 5.31452C75.7199 5.01276 76.0065 4.77756 76.3418 4.63867C76.6771 4.49979 77.046 4.46345 77.402 4.53425C77.7579 4.60506 78.0849 4.77983 78.3415 5.03645C78.5982 5.29308 78.7729 5.62005 78.8437 5.976C78.9145 6.33196 78.8782 6.70092 78.7393 7.03622C78.6004 7.37152 78.3652 7.65811 78.0635 7.85974C77.7617 8.06137 77.4069 8.16899 77.044 8.16899C76.5589 8.16405 76.095 7.96913 75.7519 7.62607C75.4089 7.283 75.2139 6.81913 75.209 6.33399V6.33399ZM75.515 9.066H78.574V19.26H75.515V9.066Z" fill="#fff"/>
                    <path d="M91.784 14.163C91.8195 14.8368 91.7215 15.511 91.4956 16.1468C91.2696 16.7826 90.9202 17.3674 90.4675 17.8677C90.0147 18.368 89.4675 18.7738 88.8573 19.0618C88.2471 19.3498 87.586 19.5144 86.912 19.546C86.3451 19.5769 85.7784 19.4813 85.2529 19.2661C84.7275 19.0509 84.2565 18.7216 83.874 18.302V23.338H80.816V9.06601H83.874V10.024C84.2566 9.60456 84.7276 9.27544 85.2531 9.06046C85.7785 8.84548 86.3451 8.75002 86.912 8.78101C87.586 8.8125 88.247 8.97694 88.8572 9.26486C89.4674 9.55279 90.0146 9.95851 90.4674 10.4587C90.9202 10.9589 91.2696 11.5437 91.4956 12.1794C91.7215 12.8151 91.8195 13.4893 91.784 14.163ZM88.726 14.163C88.714 13.6857 88.5615 13.2226 88.2876 12.8316C88.0137 12.4405 87.6305 12.139 87.1861 11.9646C86.7416 11.7903 86.2556 11.7509 85.7889 11.8514C85.3221 11.9519 84.8954 12.1878 84.5621 12.5296C84.2288 12.8715 84.0037 13.304 83.915 13.7731C83.8263 14.2422 83.878 14.7271 84.0635 15.167C84.249 15.6069 84.5601 15.9824 84.9579 16.2463C85.3557 16.5103 85.8226 16.6511 86.3 16.651C86.6279 16.6658 86.9551 16.611 87.2603 16.4904C87.5655 16.3697 87.8417 16.1859 88.0708 15.9509C88.2999 15.7159 88.4767 15.4352 88.5897 15.127C88.7026 14.8189 88.749 14.4904 88.726 14.163V14.163Z" fill="#fff"/>
                    <path d="M101.223 16.2C101.223 18.545 99.184 19.544 96.982 19.544C96.0924 19.6245 95.1992 19.4362 94.4178 19.0035C93.6364 18.5709 93.0028 17.9137 92.599 17.117L95.249 15.609C95.3567 15.9773 95.5876 16.2974 95.9031 16.5158C96.2185 16.7342 96.5994 16.8377 96.982 16.809C97.716 16.809 98.082 16.584 98.082 16.177C98.082 15.055 93.067 15.647 93.067 12.119C93.067 9.897 94.942 8.776 97.067 8.776C97.864 8.75098 98.6532 8.94011 99.3523 9.3237C100.051 9.70729 100.635 10.2713 101.042 10.957L98.433 12.364C98.3189 12.0964 98.1285 11.8683 97.8855 11.7083C97.6426 11.5482 97.3579 11.4633 97.067 11.464C96.537 11.464 96.211 11.664 96.211 12.035C96.208 13.205 101.223 12.43 101.223 16.2Z" fill="#fff"/>
                    <path d="M112.4 9.06601V19.26H109.342V18.3C108.989 18.7229 108.54 19.0561 108.033 19.2723C107.527 19.4886 106.976 19.5817 106.426 19.544C104.367 19.544 102.614 18.076 102.614 15.323V9.06601H105.672V14.877C105.646 15.12 105.674 15.3656 105.753 15.5969C105.832 15.8281 105.96 16.0394 106.129 16.216C106.298 16.3925 106.503 16.5302 106.73 16.6193C106.958 16.7084 107.202 16.7469 107.446 16.732C108.567 16.732 109.346 16.08 109.346 14.632V9.06601H112.4Z" fill="#fff"/>
                    <path d="M129.928 13V19.26H126.87V13.266C126.87 12.247 126.38 11.594 125.402 11.594C124.382 11.594 123.812 12.308 123.812 13.511V19.26H120.753V13.266C120.753 12.247 120.264 11.594 119.285 11.594C118.266 11.594 117.695 12.308 117.695 13.511V19.26H114.637V9.06602H117.7V10C118.017 9.58412 118.433 9.25429 118.91 9.04064C119.388 8.827 119.911 8.73636 120.432 8.77701C120.955 8.75142 121.477 8.86186 121.945 9.09757C122.413 9.33328 122.812 9.68623 123.103 10.122C123.442 9.66605 123.891 9.3035 124.408 9.06828C124.925 8.83305 125.494 8.73284 126.06 8.77701C128.4 8.78101 129.928 10.452 129.928 13Z" fill="#fff"/>
                    <path d="M132.519 9.00301C133.773 9.00301 134.789 7.9867 134.789 6.73301C134.789 5.47933 133.773 4.46301 132.519 4.46301C131.265 4.46301 130.249 5.47933 130.249 6.73301C130.249 7.9867 131.265 9.00301 132.519 9.00301Z" fill="#fff"/>
                    <path d="M33.457 4.37701H36.516V19.26H33.457V4.37701ZM38.248 14.163C38.2446 13.0943 38.5585 12.0486 39.1498 11.1583C39.7411 10.2681 40.5833 9.57328 41.5697 9.16196C42.5561 8.75064 43.6424 8.64127 44.691 8.84771C45.7396 9.05415 46.7034 9.5671 47.4603 10.3216C48.2172 11.0761 48.7332 12.0383 48.943 13.0863C49.1527 14.1342 49.0468 15.2208 48.6386 16.2086C48.2303 17.1963 47.5382 18.0406 46.6498 18.6348C45.7615 19.2289 44.7167 19.546 43.648 19.546C42.9382 19.5536 42.234 19.4197 41.5765 19.1521C40.919 18.8844 40.3215 18.4885 39.8187 17.9873C39.316 17.4862 38.9182 16.8899 38.6485 16.2333C38.3788 15.5766 38.2426 14.8728 38.248 14.163V14.163ZM45.996 14.163C45.984 13.702 45.8363 13.2548 45.5715 12.8772C45.3066 12.4997 44.9363 12.2087 44.5069 12.0405C44.0775 11.8723 43.6081 11.8345 43.1573 11.9318C42.7065 12.029 42.2944 12.257 41.9725 12.5873C41.6506 12.9175 41.4332 13.3354 41.3476 13.7885C41.2619 14.2416 41.3118 14.71 41.4909 15.1349C41.6701 15.5599 41.9706 15.9226 42.3548 16.1777C42.739 16.4327 43.1898 16.5689 43.651 16.569C43.9668 16.578 44.281 16.5215 44.5739 16.403C44.8667 16.2845 45.1319 16.1066 45.3526 15.8806C45.5733 15.6545 45.7447 15.3852 45.8562 15.0896C45.9676 14.794 46.0166 14.4785 46 14.163H45.996ZM61.245 9.06301V18.748C61.245 22.173 58.574 23.62 55.863 23.62C54.9087 23.692 53.953 23.5 53.1007 23.0648C52.2484 22.6296 51.5323 21.9682 51.031 21.153L53.64 19.644C53.8506 20.0695 54.1861 20.4205 54.6015 20.6501C55.017 20.8798 55.4927 20.9771 55.965 20.929C56.2664 20.9702 56.5733 20.9431 56.8628 20.8499C57.1524 20.7566 57.4174 20.5995 57.6381 20.3902C57.8589 20.1808 58.0298 19.9246 58.1383 19.6404C58.2468 19.3562 58.2901 19.0512 58.265 18.748V17.81C57.9068 18.2481 57.4509 18.5961 56.9339 18.8262C56.4169 19.0563 55.8532 19.1621 55.288 19.135C53.9424 19.0932 52.666 18.5293 51.729 17.5627C50.7919 16.5961 50.2679 15.3027 50.2679 13.9565C50.2679 12.6103 50.7919 11.3169 51.729 10.3503C52.666 9.38375 53.9424 8.81983 55.288 8.77802C55.8532 8.75097 56.4169 8.85673 56.9339 9.08683C57.4509 9.31693 57.9068 9.66496 58.265 10.103V9.06301H61.245ZM58.269 13.956C58.2891 13.4637 58.1616 12.9765 57.9026 12.5572C57.6437 12.138 57.2653 11.8057 56.8161 11.6032C56.3668 11.4007 55.8673 11.3372 55.3817 11.4209C54.896 11.5046 54.4466 11.7316 54.091 12.0727C53.7354 12.4139 53.49 12.8536 53.3863 13.3354C53.2827 13.8171 53.3255 14.3189 53.5092 14.7761C53.693 15.2334 54.0093 15.6252 54.4175 15.9012C54.8258 16.1772 55.3072 16.3248 55.8 16.325C56.1213 16.3476 56.4438 16.3027 56.7467 16.1932C57.0496 16.0837 57.3262 15.9119 57.5588 15.6891C57.7913 15.4662 57.9746 15.1972 58.097 14.8992C58.2193 14.6013 58.2779 14.281 58.269 13.959V13.956ZM62.977 14.156C62.9736 13.0873 63.2875 12.0416 63.8788 11.1513C64.4701 10.2611 65.3123 9.56628 66.2987 9.15496C67.2851 8.74364 68.3714 8.63427 69.42 8.84071C70.4686 9.04715 71.4324 9.5601 72.1893 10.3146C72.9462 11.0691 73.4622 12.0313 73.672 13.0793C73.8817 14.1272 73.7758 15.2138 73.3676 16.2016C72.9593 17.1893 72.2672 18.0336 71.3788 18.6278C70.4904 19.2219 69.4457 19.539 68.377 19.539C67.6678 19.5466 66.9641 19.4129 66.3071 19.1457C65.6501 18.8785 65.0529 18.4832 64.5502 17.9828C64.0476 17.4824 63.6496 16.8869 63.3795 16.2311C63.1094 15.5753 62.9726 14.8723 62.977 14.163V14.156ZM70.725 14.156C70.7132 13.6947 70.5656 13.2471 70.3007 12.8693C70.0358 12.4915 69.6654 12.2001 69.2357 12.0317C68.8061 11.8634 68.3364 11.8255 67.8853 11.9227C67.4342 12.02 67.0218 12.2481 66.6997 12.5786C66.3777 12.909 66.1602 13.3271 66.0745 13.7806C65.9889 14.234 66.0389 14.7026 66.2182 15.1278C66.3975 15.553 66.6983 15.9158 67.0828 16.1709C67.4673 16.426 67.9185 16.5621 68.38 16.562C68.6948 16.5704 69.008 16.5136 69.2999 16.3953C69.5918 16.277 69.8561 16.0997 70.0762 15.8745C70.2964 15.6492 70.4677 15.381 70.5793 15.0865C70.6909 14.792 70.7405 14.4776 70.725 14.163V14.156Z" fill="#fff"/>
                </svg>
            </a>

            <div class="sidebar-content">
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('admin-home') }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/dashboard.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Dashboard') }}</div>
                    </a>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-groups') }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/users.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Groups') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-groups') }}" class="submenu-item text-light d-block pl-4">{{ __('All Groups') }}</a>
                        <a href="{{ route('create-group') }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Group') }}</a>
                        <a href="{{ route('archived-groups') }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Groups') }}</a>
                    </div>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-boards') }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/boards.svg')}}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Info Boards') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-boards') }}" class="submenu-item text-light d-block pl-4">{{ __('All Boards') }}</a>
                        <a href="{{ route('create-board') }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Board') }}</a>
                        <a href="{{ route('archived-boards') }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Boards') }}</a>
                    </div>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-admins') }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/user.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Admins') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-admins') }}" class="submenu-item text-light d-block pl-4">{{ __('All Admins') }}</a>
                        <a href="{{ route('create-admin') }}" class="submenu-item text-light d-block pl-4">{{ __('Add New Admin') }}</a>
                        <a href="{{ route('archived-admins') }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Admins') }}</a>
                    </div>
                </div>
                {{-- END menu item --}}
                {{-- START menu item --}}
                <div class="menu-wrap">
                    <a href="{{ route('all-users') }}" class="menu-item d-flex align-content-center align-items-center">
                        <div class="icon mr-3">
                            <img src="{{ asset('images/user.svg') }}" alt="dashboard icon">
                        </div>
                        <div class="text text-light">{{ __('Users') }}</div>
                    </a>

                    <div class="submenu pl-5">
                        <a href="{{ route('all-users') }}" class="submenu-item text-light d-block pl-4">{{ __('All Users') }}</a>
                        <a href="{{ route('create-user') }}" class="submenu-item text-light d-block pl-4">{{ __('Add New User') }}</a>
                        <a href="{{ route('archived-users') }}" class="submenu-item text-light d-block pl-4">{{ __('Archived Users') }}</a>
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
                        <label for="search-full" class="font-weight-bold pr-4">Search</label>
                        <input type="search" id="search-full" class="form-control" placeholder="search everything">
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin-home') }}">
                                            {{ __('Dashboard') }}
                                        </a> 

                                        <a class="dropdown-item" href="{{ route('admin-account-settings') }}">
                                            {{ __('Settings') }}
                                        </a> 

                                        <div class="dropdown-divider"></div>

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

            <main class="py-0 px-2 mb-5">
                @yield('admin-content')
            </main>
        </div>
        {{-- END right col --}}
    </div>

    <div id="credits" style="display: none">
        <a href="https://iconscout.com/icons/dashboard" target="_blank">Dashboard Icon</a> by <a href="https://iconscout.com/contributors/google-inc">Google Inc.</a> on <a href="https://iconscout.com">Iconscout</a>
        <a href="https://iconscout.com/icons/people" target="_blank">People Icon</a> by <a href="https://iconscout.com/contributors/fluent">Microsoft</a> on <a href="https://iconscout.com">Iconscout</a>
        <a href="https://iconscout.com/icons/user" target="_blank">User Icon</a> by <a href="https://iconscout.com/contributors/kawalanicon">Kawalan Icon</a> on <a href="https://iconscout.com">Iconscout</a>
        <a href="https://iconscout.com/icons/view" target="_blank">View Icon</a> by <a href="https://iconscout.com/contributors/denimao" target="_blank">Deni Maolana</a>
    </div>
</body>
</html>
