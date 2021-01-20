<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signup</title>

    <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="antialiased">
    <div class="container">
        <div class="panel">

            @yield('signup')

        </div>
    </div>
</body>

</html>