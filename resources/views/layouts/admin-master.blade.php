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
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">KYC</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="home">Bedrijven</a></li>
                    <li><a href="appointments">Afspraken</a></li>
                    <li><a href="appointments">Medewerkers</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="home">Bedrijven</a></li>
                    <li><a href="appointments">Afspraken</a></li>
                    <li><a href="appointments">Medewerkers</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </header>

    {{--<aside>--}}
        {{--@include('admin.partials.sideNav')--}}
    {{--</aside>--}}

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
<script src="{{ asset("js/app.js") }}"></script>


<script>
    $(function(){
        $(".button-collapse").sideNav();
    })
</script>

@yield('javascript')

</body>
</html>