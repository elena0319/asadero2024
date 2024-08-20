<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield ('titulo', 'asadero2024') </title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        {{-- Barra de navegación --}}
        @include('layouts.navbar')
    </header>

    <main>
        {{-- Contenido principal de cada página --}}
        @yield('contenido')
    </main>

    <footer>
        {{-- Pie de página --}}
        @include('layouts.footer')
    </footer>
</body>
</html>

    

