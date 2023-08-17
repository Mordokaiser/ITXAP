@extends('templates.principal')
@section('cabeza')
    <title>Ejercicio 4 </title>
@endsection
@section('cuerpo')
    <h1>EJERCICIO Nº4 </h1>
    <p>Para el siguiente ejercicio, se puede elegir el lenguaje y herramientas de su preferencia.
    </p>
    <p>Se deberá acceder a una pantalla en donde se puedan digitar dos números enteros, que serán las
        dimensiones de la matriz. Ej. Si se ingresó un 4 y un 3, la matriz debería ser de 4x3.
    </p>
    <p>Después de que se hayan ingresado las dimensiones, se deberá mostrar en la pantalla la matriz creada,
        con números aleatorios entre 1 y 1000 (no importa si el mismo número se repite más de una vez dentro
        de la matriz). Supongamos que ingresamos una matriz de 3x3 y que, para facilitar este ejemplo,
        obtenemos los números del 1 al 9, nos debería mostrar en pantalla la matriz como la que se muestra
        abajo:
    </p>
    <table>
        <tr>
            <td>1</td>
            <td>6</td>
            <td>9</td>
        </tr>
        <tr>
            <td>8</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>5</td>
            <td>7</td>
            <td>4</td>
        </tr>
    </table>
    <p>Junto con esto, debería haber un botón que nos permita ordenarla; la matriz debe ser ordenada sin
        utilizar funciones propias del lenguaje (ningún método SORT, derivado o similar. Se debe crear una
        función o método de ordenamiento propio), quedando de la siguiente forma:
    </p>
    <table>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
        </tr>
        <tr>
            <td>4</td>
            <td>5</td>
            <td>6</td>
        </tr>
        <tr>
            <td>7</td>
            <td>8</td>
            <td>9</td>
        </tr>
    </table>
    <p>Una vez ordenada, debería aparecer otro botón que nos permita pasarla a su forma final, como espejo
        doble (intercambia las posiciones de las filas, y luego intercambia las posiciones de las columnas o
        viceversa) </p>
    <table>
        <tr>
            <td>9</td>
            <td>8</td>
            <td>7</td>
        </tr>
        <tr>
            <td>6</td>
            <td>5</td>
            <td>4</td>
        </tr>
        <tr>
            <td>3</td>
            <td>2</td>
            <td>1</td>
        </tr>
    </table>
    <p>Luego de esto, debería poder guardarse esta última matriz y la original en una Base de datos, y devolver
        algún correlativo con la que pueda ser visualizada más tarde en otra pantalla, que también debe ser
        construida. Considerar que la matriz puede tener X filas y columnas, por lo que se debe buscar un
        método para guardarla en la BD que permita almacenar las posiciones de la matriz</p>
    <h1>Solución</h1>
    <p>Primero como el enunciado lo dice, cree una pagina que pudiera generar las tablas y que luego aparecieran los botones
        para ordenarla e invertirla, evitando usar métodos de ordenamientos conocidos como el “Quick sort”, “Bubble sort”
        entre otros para generar uno propio, el cual como utiliza ciclos For y While, lo cual lleva a que no sean óptimos
        para grande cantidades de elementos por el consumo de recursos del equipo donde se ejecute, luego los envié a un
        controlador de php, para almacenarlos en una base de datos.</p>
    <a href="{{ route('ejercicio4-p1') }}"><button>Parte 1</button></a> <br><br>
    <p>Luego de tener almacenados los datos en la base de datos cree la segunda vista que se pide para mostrarlos. </p>
    <a href="{{ route('ejercicio4-p2') }}"><button>Parte 2</button></a>
@endsection
