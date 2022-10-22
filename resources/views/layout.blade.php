<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Instalar Bootstrap 5 en Laravel 9 y Vite | Diario del Programador</title>

        @vite(['resources/js/app.js', 'resources/css/app.scss'])
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
