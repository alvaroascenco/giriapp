<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GiriAPI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/forms/hamburger.js')}}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="py-7 border-b border-gray-300">
            <div class="container mx-auto flex justify-between px-5 lg:px-0 items-center">
                <div>
                    <a href="{{ url('/') }}" class="border-4 text-3xl sm:ml-2 lg:ml-0 border-blue-600 p-2 font-bold text-blue-600 no-underline">
                        giriapi_
                    </a>
                </div>
                    @guest
                      <nav class="space-x-4 w-3/4 flex flex-col md:block text-blue-600 sm:text-sm text-right">
                        <a class="no-underline text-gray-500 mb-2 lg:text-2xl sm:text-sm hover:underline" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                        @endif
                    @else
                      <nav class="space-x-4 w-3/4 text-blue-600 sm:text-sm">
                        <div id="hamburger--icon" onclick="toggleHamburger()" class="md:hidden mr-1 inline float-right cursor-pointer space-y-2">
                          <div class="w-8 h-0.5 bg-gray-600"></div>
                          <div class="w-8 h-0.5 bg-gray-600"></div>
                          <div class="w-8 h-0.5 bg-gray-600"></div>
                        </div>
                        <div id="hamburger--content" class="hidden">
                            <ul>    
                                <li class="text-center py-3 border-b-2">
                                    <a href="{{ route('home') }}"
                                        class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">Gírias catalogadas</a>
                                </li>
                                <li class="text-center py-3 border-b-2">
                                    <a href="/create"
                                       class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">Catalogar gíria</a>
                                </li>
                                <li class="text-center py-3 border-b-2">
                                    <a href="{{ route('idioms') }}"
                                       class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">Expressões em inglês catalogadas</a>
                                </li>
                                <li class="text-center py-3 border-b-2">
                                    <a href="/create/idiom"
                                       class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">Catalogar expressão em inglês</a>
                                </li>
                                <li class="text-center py-3 border-b-2">
                                    <a href="/user-options"
                                       class="no-underline text-gray-500 lg:text-2xl sm:text-sm hover:underline">Opções do usuário</a>
                                </li>
                                <li class="text-center py-3 border-b-2">
                                    <a href="{{ route('logout') }}"
                                    class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline"
                                         onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                                {{ csrf_field() }}
                                            </form>
                                </li>
                            </ul>
                        </div>
                        <div class="hidden md:flex md:justify-between">
                            <a href="{{ route('home') }}"
                               class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline">Gírias catalogadas</a>
                            <a href="{{ route('idioms') }}"
                               class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline">Expressões em inglês catalogadas</a>
                            <a href="/create"
                               class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline">Catalogar gíria</a>
                            <a href="/create/idiom"
                               class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline">Catalogar expressão em inglês</a>
                            <a href="/user-options"
                               class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline">Opções do usuário</a>
                            <a href="{{ route('logout') }}"
                               class="no-underline text-gray-500 lg:text-lg sm:text-sm hover:underline"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
    <style>
        #hamburger--content {
            opacity: 0;
            position: absolute;
            top: 10%;
            left: -5%;
            background-color: white;
            width: 100%;
            transform-origin: 0% 0%;
            transform: translate(0, -200%);
            z-index: 10;
            transition: opacity 0.5s ease-in-out, transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
        }
        .efeitoUnderline {
            position: relative;
        }
        .efeitoUnderline:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #6b7280;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }
        .efeitoUnderline:hover:before {
            visibility: visible;
            width: 100%;
        }
    </style>
</body>
</html>
