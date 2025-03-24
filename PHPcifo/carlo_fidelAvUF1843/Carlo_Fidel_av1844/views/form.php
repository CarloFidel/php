<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VALIDAR FORMULARIOS EN PHP</title>
  </head>
  <body>
      <form class="d-flex" role="search" method="get">
       <label></label>
       <select name="lang">
        <option selected> Selecciona</option>
        <option value="cast" name="castellano">Castellano</option>
        <option value="cat" name="catalán">Catalán</option>
        </select>
        <button type="submit">Cambiar</button>
      </form>

    <h1>Ingrese nombre y Email</h1>
    <form action="controller/validator.php" method="POST">
      <label for="nombre">Nombre</label><br />
      <input
        type="text"
        name="nombre"
        value="<?=isset($nombre)? $nombre : '';?>"
      /><br />
      <label for="email">Email</label><br />
      <input
        type="text"
        name="email"
        value="<?=isset($email)? $email : '';?>"
      /><br />
      <input type="submit" name="enviar" value="Enviar" />
    </form>
  </body>
</html>
