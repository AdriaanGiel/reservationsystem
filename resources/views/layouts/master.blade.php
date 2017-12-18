
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/vendor.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset("css/app.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="secondary-background">

<div class="container custom flex flex-column flex-space-between">
    <header class="login-header">

    </header>

    <main class="flex-margin-bottom-auto">

        @yield('content')

    </main>


</div>



<!--  Scripts-->
<script src="{{ asset("js/manifest.js") }}"></script>
<script src="{{ asset("js/vendor.js") }}"></script>
{{--<script src="{{ asset("js/app.js") }}"></script>--}}


</body>
</html>
