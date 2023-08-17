@extends('templates.principal')
@section('cabeza')
    <!-- JS -->
    <script src="{{ asset('js/ejercicio4.js') }}"></script>
    <title>Ejercicio 4 P1 </title>
    <!-- Token de seguridad de larabel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cuerpo')
    <h1>Parte 1 </h1>
    <p>Ingrese valores para generar la matriz
    </p>
    <input type="number" id="filas" placeholder="Filas">
    <input type="number" id="columnas" placeholder="Columnas">
    <button id="generarBtn" onclick="generarTabla()">Generar Tabla</button>
    <br><br>
    <div id="tablaContainer"></div>
    <br>
    <div class="row">
        <div class="col">
            <button id="ordenarBtn" onclick="ordenarMatriz()" style="display: none">Ordenar</button>

            <button id="invertirBtn" onclick="invertirMatriz()" style="display: none">Invertir</button>
            <button id="guardarBtn" onclick="guardarMatrices()" style="display: none">Guardar</button>
        </div>
    </div>
    <?php 
    //Esto no se debe hacer, pero por tiempo mostrare asi el ultimo ID
    use App\Models\matriz;
    $lastId = Matriz::orderBy('id', 'desc')->first()->id;
        $newId = $lastId + 1;

        echo "Al guardar esta matriz el id sera: ".$newId;
    ?>
@endsection
