<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <!-- Recoge y presenta los resultados recibidos de validator.php -->
  <body>
    <?php if('ok'=== $error);?>
    <h1>Su cuenta es:</h1><br>
    <p><?php echo 'Nombre de usuario:' . ' ' . $_SESSION['nombre']?></p>    
    <p><?php echo 'Email:' . ' ' . $_SESSION['email']?></p>    
    <h1>Lista de usuarios:</h1><br>
    <?php

require_once "../model/model.php";
    echo 'lista de ususario';

?>
  </body>
</html>
