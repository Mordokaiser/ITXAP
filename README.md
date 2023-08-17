<h1>Informacion del proyecto</h1>
<pre>
"require": {
        "php": "^7.3|^8.0",
        "fruitcake/laravel-cors": "^2.0",
        "guzzlehttp/guzzle": "^7.0.1",
        "laravel/framework": "^8.75",
        "laravel/sanctum": "^2.11",
        "laravel/tinker": "^2.5"
    },
</pre>
<h1>Recomendaciones</h1>
<p>1) Utilizar laragon para iniciar el proyecto </p>
<p>https://laragon.org/download/index.html</p>
<p>2) Nombrar a la base de datos itxap</p>
<p>3) Configurar la base de datos en el archivo .env de la siguiente forma: </p>
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=itxap
DB_USERNAME=root
DB_PASSWORD=
</pre>
<h1>Tips</h1>
<p> 1) Al descargar este proyecto no tendras un archivo .env , por lo tanto tendras que copiar y pegar el archivo ".env.example" y borrar desde el segundo nombre en adelante</p>
<p> 2) Los archivos multimeda, js, css, etc se encuentran en la carpeta public, tanto las carpetas como el contenido de la carpeta fue creado por mi</p>
<p> 3) Las rutas estan ubicadas en la carpeta routes y en el archivo web.php</p>
<p> 4) Cree y utilice un unico controlador ubicado en la carpeta app/http/controllers y se llama MatrizController.php</p>
<p> 5) Los modelos que cree para comunicarme con la base de datos estan en la carpeta app/models </p>
<p> 6) Si utilizas laragon por primera vez y quieres generar una base de datos de manera simple con phpmyadmin, podras instalarlo haciendo click derecho en la zona blanca de laragon hacer click en la opcion de herramientas, luego click en Quick add y finalmente click en phpmyadmin </p>
<h1>Base de datos</h1>
<p>La base de datos que utilice se puede descargar del siguiente link https://drive.google.com/file/d/1flzYdfGG4g4R4LMaPcmmb0pI25n_tlJ5/view?usp=sharing</p>
<br>
<h1>Curiosidad</h1>
<p> 1) Inicialmente pense en copiar el diseño del sitio web de la empresa, pero termine optando por imitar al lector de PDF del navegador, como remanente de esto deje el logo de la empresa y la nav bar superior solo que sin la transparencia y con la fuente de google que utiliza el sitio web de la empresa </p>
<p> 2) Como me fui por un diseño mas simple no utilice diseños para las tablas ni para los botones, pero si conserve los colores del archivo PDF que me enviaron como evaluacion</p>