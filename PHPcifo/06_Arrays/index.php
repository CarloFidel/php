<?php
function pDump($param)
{
  echo "<pre><code>";
  var_dump($param);
    echo "</code></pre>";

}

$pelicula = "Airbag";
$peliculas = ['Airbag', 'Abierto hasta el amanecer', 'The bad Taste'];
$cantante = ['josele Santiago', 'Justin Sulivan', 'Chrissie Hyde'];

//Array asociativo
$personas = [
  'nombre' =>'Oscar',
  'apellidos' => 'Eroles',
  'web' => 'myweb.com'
];
echo $personas['apellidos'];

//Recorrer con FOR
echo "<h1>listado de películas</h1>";
echo "<>";

/* for ($i = 0; $i <ul count($peliculas); $i++){
  echo "<li>" . $peliculas[i] . "</li>";
}
 */echo "</ul>";
//recorrer con Foreach
echo "<h1>listado de cantantes</h1>";
echo "<ul>";
foreach ($cantante as $cantantes) {
}


//recorrer con Foreach
echo "<h1>listado de personas</h1>";
echo "<ul>";
foreach ($cantante as $key => $value) {
  echo "<li>$key = $value</li>";
}
echo "</ul>";
echo "<br>";

//Arrays multidimensionales
$agenda = [
  'uno' =>['nombre' => 'pepe', 'Apellidos' => 'perez', 'email' => 'email@gmail.com'],
  ['nombre' => 'Pepon', 'email' => 'otro@gmail.com' ],
  ['nombre' => 'jose', 'email' => 'mas@gmail.com' ],
  'nombre' => 'Antonio',
  5,
  'dos' =>['prueba' => 'Hoy']
];

foreach ($agenda as $key => $value) {
if(is_array($value)){
  foreach ($value as $indice => $valor){
    echo 'Indice'. ':'. " " . $indice . " - " . $valor . "<br>";
  }
}else {
  echo $key . " - " . $value . "<br>";
}

}