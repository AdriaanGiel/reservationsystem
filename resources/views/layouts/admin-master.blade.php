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
    <link href="{{ asset("css/app.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body class="full-screen-height">
<div id="app">
    <header>
        <nav class="red-background" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="{{ route('admin')  }}" class="brand-logo">Admin</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ route('admin.companies.index') }}">Bedrijven</a></li>
                    <li><a href="{{ route('admin.assignments.index') }}">Afspraken</a></li>
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

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="{{ route('admin.companies.index') }}">Bedrijven</a></li>
                    <li><a href="{{ route('admin.assignments.index') }}">Afspraken</a></li>
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
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset("js/admin.js") }}"></script>


<script>
    $(function(){
        $(".button-collapse").sideNav();
    })
</script>

@yield('javascript')

</body>
</html>
