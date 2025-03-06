<?php
function volver(){
echo "Alert";
/*   header('location: crea_sesiones.php');*/  
header("Location: form_crea_cookie.php");

}

if (!isset($_GET['enviar'])){
  volver();
  exit();
}

if ((isset($_GET['nombre']) && empty($_GET['nombre'])) || (isset($_GET['email']) && empty($_GET['email']))) {
    volver();
    exit();
}else{

  $nombre=$_GET['nombre'];
  $email=$_GET['email'];
  $myArray=['nombre' => $_GET['nombre'], 'email' => $_GET['email']];
  setcookie("nombre", $nombre, time() + (3));
  setcookie("email", $email, time() + (3));

  header("refresh:10;url=envio_cookie.php");

  foreach ($myArray as $key => $value) {
    echo "<li>$key = $value </li>";
}
}
//setcookie("micookie", "valor de mi galleta");

