<!DOCTYPE html>

<html>
    <head>
        <meta charset='utf-8'>
        <title>@yield('titulo')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('css/style-fixo.css') }}" rel="stylesheet">
    </head>

    <header>
        @include('includes.menu')
    </header>

    <body>

        @yield('conteudo')

        @include('includes.JS_bootstrap')
    </body>
</html>