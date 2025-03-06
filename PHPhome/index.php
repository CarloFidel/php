<?php
$nombre = $_GET['nombre']; 
echo $nombre . "<br>" ;
echo "<br>";

$long = strlen($nombre);

if($long >= 6){
  echo "Este string es largo";
}else{
  echo "Este string es corto";
}
echo "<br>";
echo "<br>";

$palabras=explode(" ",$nombre);

echo $palabras[2]. "<br>";
echo "<br>";

$nom=['nombre01', 'nombre02', 'Apellido01', 'Apellido02' ];

foreach($palabras as $key => $value){
  echo $key . " = " . $value . "<br>";
}
unset($nombre[3]);
echo $nombre . "<br>" ;

$resultado = sprintf ($nombre,"Pionero");
echo $resultado,"<br>";