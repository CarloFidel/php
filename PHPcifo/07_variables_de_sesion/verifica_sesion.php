<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])){
  header("refresh:3;url=creo_sesion.php");

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificacion de sesionesnt</title>
</head>
<body>
  <h1>Datos recibidos<h1>
    <p>Nobre: <?=$_SESSION['nombre']; ?></p>
    <p>Correo: <?=$_SESSION['email']; ?></p>
    <?php session_destroy()?>
    <p>
      <a href="creo_sesion.php">Volver a entrar</a>
    </p>

</body>
</html>