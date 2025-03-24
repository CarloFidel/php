<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../controller/validator.php">
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="mb-3">
  <form action="controller/validator.php" class="form-label" method="POST">
   <div class="mb-3">
    <label for="text">Examen 1</label>
    <input type="text" name="examen1" class="form-control bg-light" >
   </div>
   <div class="mb-3">
    <label for="text">Examen 2</label>
    <input type="text" name="examen2" class="form-control bg-light" >
   </div>
  <div class="mb-3">
    <label for="text">Examen 3</label>
    <input type="text" name="examen3" class="form-control bg-light">
  </div>
  <div class="mb-3">
    <label for="text">Examen 4</label>
    <input type="text" name="examen4" class="form-control bg-light" >
  </div>
  <div class="mb-3">
    <label for="text">Examen 5</label>
    <input type="text" name="examen5" class="form-control bg-light" >
  </div>
    <button type="submit" class="btn btn-success" name="enviar">Submit</button>
 </form>
</div>
</body>
</html>
