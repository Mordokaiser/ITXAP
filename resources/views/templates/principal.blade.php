<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- js boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--css-->
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <!-- font -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
    @yield('cabeza')
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <img src="{{ asset('src/logos/itxap.png') }}" alt="Logo">
            </div>
            <div class="navbar-center">
                <a href="{{ route('ejercicio1') }}">Ejercicio 1</a>
                <a href="{{ route('ejercicio2') }}">Ejercicio 2</a>
                <a href="{{ route('ejercicio3') }}">Ejercicio 3</a>
                <a href="{{ route('ejercicio4') }}">Ejercicio 4</a>
            </div>
            <div class="navbar-right">
                <span>Fabian Pinilla</span>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="left-panel"></div>
        <div class="center-panel">
            <!-- Contenido del centro -->
            @yield('cuerpo')
        </div>
        <div class="right-panel"></div>
    </div>
   
</body>

</html>
