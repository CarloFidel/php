<?php
require "../lang/".$_SESSION['idioma'].".php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body class="container">
    <header class="bg-dark text-white">
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div  class="container-fluid">
      <form class="d-flex" role="search" method="get">
       <label class="container-fluid"><?= $lang['cambiar_idioma'];?></label>
      </form>
    </div>
   </nav>
   </header>
     <div class="btn-group">
  <?php 
  echo '<a href="../assets/gestorfeedback.php?lang=cast&canvi=true" class="btn btn-primary">' . $lang['opcion_2'] . '</a>';
  echo '<a href="../assets/gestorfeedback.php?lang=cat&canvi=true" class="btn btn-primary">' . $lang['opcion_3'] . '</a>';
  ?>
  </div>


    <h2><?php echo $lang['enuncfeedback'];?></h2><br>
    <p><?php echo $lang['nombre']. ':'. ' ' . $_SESSION['nombre']?></p>    
    <p><?php echo 'Email:' . ' ' . $_SESSION['email']?></p>    
    <h2><?php echo $lang['enunctabla'];?></h2>
    <h3><?php echo $lang['lista'];?></h3><br>
    <?php

    
$sql = "SELECT * FROM usuarios";
$result = $con->query($sql);

if($result->num_rows > 0){
  echo 
  '<table class="table table-striped">
      <thead >
        <tr></tr>
         <th>cd_id</th>
         <th> '. $lang['usuario']. '</th>
         <th>email</th>
        </tr>
      </thead>
      <tbody>';
        while ($row = $result-> fetch_assoc()){
        echo '<tr>
          <td>' . $row['cd_id']. '</td>
          <td>' . $row['usuario']. '</td>
          <td>' . $row['email']. '</td>
          <td></td>
        </tr>';
}
      '</tbody>
    </table>';

}
?>


  </body>
</html>
