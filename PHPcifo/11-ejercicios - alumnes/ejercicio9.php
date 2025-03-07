<?php
/*
Ejercicio 9. Escribir un programa con PHP que añada valores a un array ya existente ,mientras que su longuitud sea menor a 15 y luego mostrarlo por pantalla.
 */
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
pDump($arrayExistente);