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
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
        <nav class="red-background" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="{{ route('admin')  }}" class="brand-logo">Admin</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('admin.assignments.index') }}">Afspraken</a></li>
                    <li><a href="{{ route('admin.companies.index') }}">Bedrijven</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Medewerkers</a></li>
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><div class="user-view">
                            <div class="background">
                                <img src="{{ asset('img/KYC_logo_embleem_5bzwart_5d.jpg')  }}">
                            </div>
                            <a href="#!user"><img class="circle" src="{{ asset('img/default-user.png')  }}"></a>
                            @if(Auth::check())
                                <a href="#!name"><span class="white-text name">{{ Auth::user()->profile->fullName()  }}</span></a>
                                <a href="#!email"><span class="white-text email">{{ Auth::user()->email  }}</span></a>
                            @endif
                        </div>
                    </li>
                    <li><a href="{{ route('admin.assignments.index') }}">Afspraken</a></li>
                    <li><a href="{{ route('admin.companies.index') }}">Bedrijven</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Medewerkers</a></li>
                    @if(Auth::check())
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
        <div class="container">
            @yield("content")
        </div>
    </main>


    <footer>

    </footer>


</div>

<!-- Scripts -->
<script src="{{ asset("js/manifest.js") }}"></script>
<script src="{{ asset("js/vendor.js") }}"></script>


@yield('before_general')

<script src="{{ asset("js/admin.js") }}"></script>


<script>
    $(function(){
        $(".button-collapse").sideNav();
    })
</script>

@yield('javascript')

</body>
</html>
