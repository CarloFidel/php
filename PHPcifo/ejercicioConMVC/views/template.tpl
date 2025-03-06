<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  <title>Qué tiempo hace?</title>
  <style>

  </style>
</head>

<body class="verdana-font">
  <div class="container p-5 mt-5 bg-white shadow-sm">
    <h1>¿Quieres saber la temperatura de una ciudad?</h1><br>

    <form>
      <input type="text" class="form-control w-25" name="ciudad" placeholder="Introduce una ciudad"><br>
      <input type="submit" class="btn btn-primary" name="btn" value="Enviar">
    </form><br>

    <div id="previsionTiempo">
      <?php
      if ($prevision){ echo '<div class="alert-success p-5">'.$prevision.'</div>';}
      else if($error != ""){
        echo '<div class="alert-danger p-5">'.$error.'</div>';
      } ?>
    </div>

</html>