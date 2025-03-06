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
    <h1>Datos validados coreectamente</h1>
    <p><?=isset($_SESSION['nombre'])? $_SESSION['nombre'] : '';?></p>
    <p><?=isset($_SESSION['apellidos'])? $_SESSION['apellidos'] : '';?></p>
    <p><?=isset($_SESSION['edad'])? $_SESSION['edad'] : '';?></p>
    <p><?=isset($_SESSION['email'])? $_SESSION['email'] : '';?></p>
    <p><?=isset($_SESSION['pass'])? $_SESSION['pass'] : '';?></p>
  </body>
</html>
