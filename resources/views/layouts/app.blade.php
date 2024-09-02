<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/gfa.js') }}" defer></script>
    <script src="{{ asset('lang/' . app()->getLocale() . '.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>

    <script type="text/javascript" language="javascript" src="{{ asset('js/Sortable.min.js') }}"></script>

    <!-- Fonts -->
    <link href="{{ asset('fonts/montserrat.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gfa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

    @yield('head')
</head>

<body>
    <div class="d-flex flex-column min-vh-100" id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top hide-when-printing">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="breadcrumbs">
                        @yield('header')
                    </div>
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Language Selection -->
                        <!--li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('##LANGUAGE##') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/change-language/de">
                                    Deutsch
                                </a>

                                <a class="dropdown-item" href="/change-language/en">
                                    English
                                </a>

                            </div>
                        </li-->

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.registration') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @php($user = Auth::user())
                                    {{ $user['username'] . (isset($user['impersonate_id']) ? ' (' . __('as') . ' ' . $user['impersonation']['username'] . ')' : '') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(isset($user['impersonate_id']))
                                        <form action="/users/impersonate/{{ Auth::id() }}" method="POST">
                                            @method('PUT') @csrf
                                            <button class="dropdown-item" style="cursor: pointer;">{{ __('Stop Impersonation') }}</button>
                                        </form>
                                    @endif
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change-password-modal" style="cursor: pointer;">{{ __('Change Password') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="flex-fill py-4">
            <div class="container">
                <div class="hide-when-printing" style="height: 3.75em;"></div>
                @yield('content')
            </div>

            <div class="page-load-wrapper fixed-top" style="display: none;">
                <span class="page-load"><span class="page-load-inner"></span></span>
            </div>
        </main>

        @include('cookie-consent::index')

        @hasSection('footer')
        <footer class="footer mt-auto p-3 bg-white shadow-up-sm">
            <div class="container-fluid" style="width: 80%;">
                @yield('footer')
            </div>
        </footer>
        @endif
    </div>

    @if(session()->has('error'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3 mb-4 hide-when-printing" style="z-index: 9999 !important;">
            <x-toasts.error :message='session()->get("error")'></x-toasts.error>
        </div>
    @elseif(session()->has('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3 mb-4 hide-when-printing" style="z-index: 9998 !important;">
            <x-toasts.success :message='session()->get("success")'></x-toasts.success>
        </div>
        @php(session()->forget('success'))
    @elseif(session()->has('info'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3 mb-4 hide-when-printing" style="z-index: 9997 !important;">
            <x-toasts.info :message='session()->get("info")'></x-toasts.info>
        </div>
    @endif

    <x-modals.change-password></x-modals.change-password>

    <!-- Tooltips -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <x-scripts.clear-focus-modal></x-scripts.clear-focus-modal>
    <x-scripts.clear-focus-offcanvas></x-scripts.clear-focus-offcanvas>

    @error('pw.*')
    <script>
        show('change-password-modal')
    </script>
    @enderror
</body>
</html>
