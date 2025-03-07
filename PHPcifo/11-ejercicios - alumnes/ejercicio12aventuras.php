<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>AVENTURAS</h1>
  <?php
  session_start();
foreach($_SESSION['aventura'] as $value){
  echo $value. "<br>";
}
  ?>
</body>
</html>
