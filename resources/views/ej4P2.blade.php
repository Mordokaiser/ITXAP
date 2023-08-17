@extends('templates.principal')
@section('cabeza')
    <!-- JS -->
    <script src="{{ asset('js/ejercicio4-2.js') }}"></script>
    <!-- token de larabel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ejercicio 4 P2 </title>
@endsection
@section('cuerpo')
    <h1>Parte 2</h1>
    <p>Ingresar ID de una matriz y aprete el boton "Buscar"</p>
    <form id="buscarForm">
        <input type="number" id="matrizId" placeholder="ID de la matriz">
        <button type="button" onclick="buscarMatriz()">Buscar</button>
    </form>
    <div id="matriz"></div>
    <div id="matrizFinal"></div>
@endsection
