<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar']) ) {
  $examen1=$_POST['examen1'];
  $examen2=$_POST['examen2'];
  $examen3=$_POST['examen3'];
  $examen4=$_POST['examen4'];
  $examen5=$_POST['examen5'];
}
$arrayNotas=[$examen1,$examen2,$examen3,$examen4,$examen5];
for ($i = 0; $i < count($arrayNotas); $i++) {
  $nota = $arrayNotas[$i];
  if ($nota == 10) {
    $result = "es Matrícula de honor";
  } elseif ($nota >= 9) {
    $result = "está Excelente";
  } elseif ($nota >= 7) {
    $result = "está Notable";
  } elseif ($nota >= 5) {
    $result = "está Aprobado";
  } elseif ($nota < 5) {
    $result = "está Suspenso";
  } 
  echo "La nota obtenida en el examen " . ($i + 1) . " es " . $nota . " por lo tanto, el alumno". " " . $result . "<br>";
}
$mediaNotas = ($examen1 + $examen2 + $examen3 + $examen4 + $examen5) / 5;
echo "La media de las notas es: " . round($mediaNotas,0) . "<br>";
