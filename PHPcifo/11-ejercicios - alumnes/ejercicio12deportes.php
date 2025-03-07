<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>DEPORTES</h1>
</body>
</html>
<?php
session_start();
foreach($_SESSION['deportes'] as $value){
  echo $value. "<br>";
}
?>