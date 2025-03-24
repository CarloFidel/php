<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Concluya la oración siguiente:</h2>
  <?php
  ?>

  <p>"Este array solo existe</p>
  <input type="text" name="nuevoArray" placeholder="Termine la oración" method="post">
  
</body>
</html>
<?php
/*
Ejercicio 9. Escribir un programa con PHP que añada valores a un array ya existente ,mientras que su longuitud sea menor a 15 y luego mostrarlo por pantalla.
 */
/* echo "<br>";
$arrayExistente = ["esto es un array existente","el día", "del año 2025"];
$añadido = ["jueves del mes de marzo", "del 2025"];
print_r($arrayExistente);
if(count($arrayExistente) < 15){
  $arrayExistente[]=$añadido[0];
}
function pDump($arrayExistente){
  echo "<pre>";
  var_dump($arrayExistente);
  echo "</pre>";
}
pDump($arrayExistente); */
$arrayExistente = $_POST['existente'];
echo $arrayExistente;
/* if(isset($_POST['nuevoArray']) && !empty($_POST['nuevoArray'])){
}; */