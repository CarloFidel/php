  <!DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title><?php echo $lang ?></title>
  </head>
  <body class="p-5">
    <header class="bg-dark text-white">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand"><?php echo $lang['logo']?></a>         
      <form class="d-flex" role="search" method="get">
       <label><?php echo $lang['cambiar_idioma'];?></label>
       <select name="lang">
        <option selected><?php echo $lang['opcion_1'];?></option>
        <option value="cast"><?php echo $lang['opcion_2'];?></option>
        <option value="cat"><?php echo $lang['opcion_3'];?></option>
        </select>
        <button type="submit"><?php echo $lang['cambiar'];?></button>
      </form>
    </div>
  </div>
</nav>
    </header>
  <?php menu($lang);?>
      <h3><?= $lang['descripcion'];?></h3>
     