<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VALIDAR FORMULARIOS EN PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body class="container">
<header class="bg-dark text-white">
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <form class="d-flex" role="search" method="get">
       <label class="container-fluid"><?= $lang['cambiar_idioma'];?></label>
       <select name="lang" class="form-select" aria-label="Disabled select example">
        <option selected> <?php echo $lang['opcion_1'];?></option>
        <option value="cast" name="castellano"><?php echo $lang['opcion_2'];?></option>
        <option value="cat" name="catalán"><?php echo $lang['opcion_3'];?></option>
        </select>
        <button class="btn btn-primary " type="submit"><?php echo $lang['cambiar'];?></button>
      </form>
    </div>
   </nav>
   </header>

    <h1 class="container-fluid"> <?= $lang['enunciado'];?> </h1>
    <form class="container-fluid" action="controller/validator.php" method="POST">
      <div class="mb-3">
      <label class="form-label" for="nombre"><?= $lang['nombre']. ":";?></label>
      <input
        placeholder = "Nombre con mayúscula"
        class="form-control <?=$class; ?>"
        type="text"
        name="nombre"
        value="<?=isset($nombre)? $nombre : '';?>"
      />
      </div>
      <div class="mb-3">
      <label class="form-label" for="email"><?= $lang['email']. ":";?></label>
      <input
        class="form-control <?= $class; ?>"
        type="text"
        name="email"
        value="<?=isset($email)? $email : '';?>"
      />
      </div>
      <input class="btn btn-primary" type="submit" name="enviar" value="Enviar" />
    </form>
  </body>
</html>
