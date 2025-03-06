<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="d-flex justify-content-center align-items-center">
  <form for="nombre" class="form-label" action="envio_v_sesion.php" method="get">
    <div class="mb-3">
    <label for="nombre" class="">nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control bg-light" placeholder="Introduce tu nombre" value="<?= isset($_SESSION['NOMBRE'])? $_SESSION['NOMBRE'] : "";?>">
    </div>
    
    <div class="mb-3">
    <label for="mail" class="form-label">mail</label>
    <input type="email" name="email" id="mail" class="form-control bg-light" placeholder="Introduce tu correo" value="<?= isset($_SESSION['mail']) ? $_SESSION['mail'] : ""; ?>">

    </div>
    <button type="submit" class="btn btn-success" name="enviar">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </form>
  
</body>
</html>