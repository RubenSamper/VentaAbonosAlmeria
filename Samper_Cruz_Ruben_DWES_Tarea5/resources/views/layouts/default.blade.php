<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css?2') }}">
    <title>@yield('title')</title>
</head>
<body>
    <x-layouts.menu/>
    <div>
        @yield('contenido')
    </div>

    <footer class="footer">
    
    <!--sirve para que si el usuario no inicia sesión se muestre el enlace de inicio de sesión -->

    @guest
        <a class="btn btn-sm btn-success" href="{{ route('usuarios.login') }}">Administración</a>
    @endguest

    <!--una vez que el usuario inicia sesión se va a mostrar el enlace para comprar abonos y cerrar sesión -->
    
    <a  href="{{ route('abonos.create') }}">Comprar Abono</a>
    @auth
        <a href="{{ route('usuarios.logout') }}">Cerrar Sesión</a>
    @endauth
</footer>
</body>
</html>