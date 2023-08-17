@extends('templates.principal')
@section('cabeza')
 <!-- JS -->
 <script src="{{ asset('js/ejercicio1.js') }}"></script>
 <script src="{{ asset('js/colorear.js') }}"></script>
    <title>Ejercicio 1 </title>
@endsection
@section('cuerpo')
    <h1>EJERCICIO Nº1 </h1>
    <p>Se requiere una función en JavaScript que genere un Rut Chileno, de forma aleatoria cada vez que sea
        llamado, y que el formato de retorno debe considerar los puntos y guion, como por ejemplo:
        '59.106.880-6'.</p>
    <p id="anotacion"> **El Rut debe cumplir con la consistencia del digito verificador.
    </p>
    <br>
    <h1>Solución</h1>
    <p>RUT: <span id="rut">1.000.000-9  </span><button class="boton" onclick="rut()">Generar</button></p>
@endsection
