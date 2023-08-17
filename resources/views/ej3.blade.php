@extends('templates.principal')
@section('cabeza')
    <title>Ejercicio 3 </title>
@endsection
@section('cuerpo')
    <h1>EJERCICIO Nº3 </h1>
    <p>En el siguiente ejercicio propuesto (a modo ilustrativo, no debe generar un programa funcional, sino
        teórico): identifique la clase que se debe extender, y a partir de eso crear el código necesario, para así
        poder completar los <span id="incognita">???</span> faltantes del programa cliente, y lograr teóricamente reproducir
        los tipos de
        audio MP3 y OGG según sea el caso que se le pida al programa.
    </p>
    <img src="{{ asset('src/img/ej3p1.png') }}" alt="Imagen 1">
    <img src="{{ asset('src/img/ej3p2.png') }}" alt="Imagen 2">
    <br><br>
    <h1>Solución</h1>
    <p>Para comparar datos de tipo String es mas adecuado utilizar la función equals() ya que esta va a comparar el contenido de la variable o del objeto que se reciba  </p>
    <pre>
       <span id="funcion"> static void </span>configurar(<span id="funcion"> String</span>[] args) {
        <span id="funcion"> if</span> (args[0].equals("ogg")) {
                player = <span id="incognita">???;</span>
            }  <span id="funcion">  else </span>{
                player = <span id="incognita">???;</span>
            }
        }
    </pre>
    <p>Como la clase "AudioPlayer" tiene los métodos para crear el objeto de audio y reproducirlo se puede utilizar en una nueva clase que implemente sus métodos  </p>
    <pre>
        public class MP3Player extends AudioPlayer {
            public IAudio createAudioObj() {
                return new MP3Audio(); 
            }
        }
        
        public class OGGPlayer extends AudioPlayer {
            public IAudio createAudioObj() {
                return new OGGAudio(); 
            }
        }
    </pre>
    <p> Finalmente dejamos los reproductores de audios adecuados según el caso  </p>
    <pre>
        <span id="funcion"> static void </span>configurar(<span id="funcion"> String</span>[] args) {
         <span id="funcion"> if</span> (args[0].equals("ogg")) {
                 player = new OGGPlayer();
             }  <span id="funcion">  else </span>{
                 player = new MP3Player();
             }
         }
     </pre>
     
@endsection
