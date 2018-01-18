<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/vendor.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" media="screen,projection">
    @yield('css')
    <link href="{{ asset("css/app.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="theme-color" content="#ffffff">

</head>
<body class="full-screen-height">
    <div id="app">
        <header>

            <ul id="dropdown2" class="dropdown-content">
                <li><a href="{{ route('assignments.index') }}">Rooster</a></li>
                <li><a href="{{ route('assignments.create') }}">Lijst</a></li>
            </ul>

            <ul id="dropdown3" class="dropdown-content">
                <li><a href="{{ route('assignments.index') }}">Rooster</a></li>
                <li><a href="{{ route('assignments.create') }}">Lijst</a></li>
            </ul>

            {{--class="dropdown-button" href="#!"  data-activates="dropdown3"--}}


            <nav class="light-blue lighten-1" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">KnowYourCity</a>
                    <ul class="right hide-on-med-and-down">
                        {{--<li><a href="{{ route('home') }}">Home</a></li>--}}
                        <li><a href="{{route('assignments.index')}}" >Afspraken<i class="material-icons right"></i></a></li>
                        <li><a href="{{ route('user.profile') }}#/dashboard">Profiel</a></li>
                        @if(Auth::check())
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{ route('admin') }}">Admin</a></li>
                            @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                                <form action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        @endif
                    </ul>

                    {{--class="dropdown-button" href="#!" data-activates="dropdown2"--}}

                    <ul id="nav-mobile" class="side-nav">
                        {{--<li><a href="{{ route('home') }}">Home</a></li>--}}
                        <li><a href="{{route('assignments.index')}}">Afspraken<i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a @click="removeSideBar" href="{{ route('user.profile') }}#/dashboard">Profiel</a></li>
                        @yield('nav-item')
                        @if(Auth::check())
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{ route('admin') }}">Admin</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                </div>
            </nav>



        </header>

        <br>
        <main>


            @if(!isset($profile_var))
                <div class="container">
                    @yield("content")
                </div>
            @else
                @yield("content")
            @endif

        </main>


        <footer>

        </footer>


    </div>

    <!-- Scripts -->
    <script src="{{ asset("js/manifest.js") }}"></script>
    <script src="{{ asset("js/vendor.js") }}"></script>
    @yield('before_general')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset("js/app.js") }}"></script>

    <script>
        $(function(){
            $(".dropdown-button").dropdown();
            $(".button-collapse").sideNav();
        })
    </script>

    @yield('javascript')

</body>
</html>
