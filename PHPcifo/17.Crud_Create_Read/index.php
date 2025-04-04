<?php
require_once 'connect.php';

//Procesamos el formulario de insercion
if(isset($_REQUEST['crear'])){
  $nom = $_REQUEST['nom'];
  $ape = $_REQUEST['ape'];

  $sql = "INSERT INTO datos_usuarios (Nombres, Apellidos) VALUES (?, ?)";
  $stmt = $con->prepare($sql);
  $stmt->execute([$nom, $ape]);
  header("location:index.php");
  exit; //Importante terminar la ejecucion despues del redirect
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
</head>
<body>
  <?php
  //READ
  $stml = $con->query("SELECT * FROM datos_usuarios");
  $registros = $stml->fetchAll();
  ?>
  <h1>CRUD
    <span class="subtitulo">Create Read Update Delete</span>
  </h1>
  <table width="80%" border=1>
    <th>
      <td>id</td>
      <td>Nombres</td>
      <td>Apellidos</td>
      <td>nada</td>
      <td>nada</td>
    </th>
    <?php 
    foreach($registros as $dato){
      echo '
      <tr>
      <td>' . $dato['id'] . '</td>
      <td>' . $dato['Nombres'] . '</td>
      <td>' . $dato['Apellidos'] . '</td>
      <td class="bot">
      <a href="borrar.php?id=' . $dato['id'] . '"><input type="button" name="del" id="del" value="Borrar"></a></td>
      <td class="bot"><a href="editar.php?id=' . $dato['id'] . '&nom=' . $dato['Nombres'] . '&ape=' . $dato['Apellidos'] . '">
      <input type="button" name="up" id="up" value="Actualizar"></a></td>
      </tr>'; 
    } 
    ?>
    <form method="post" action="">
      <tr>
      <td></td>
      <td><input type="text" name='nom' size='10' class='centrado'></td>
      <td><input type="text" name='ape' size='10' class='centrado'></td>
      <td collspan="2" class="bot"><input type="submit" name='crear' id='crear' value='insertar'></td>
      </tr>


    </form>
  </table>
</body>
</html>