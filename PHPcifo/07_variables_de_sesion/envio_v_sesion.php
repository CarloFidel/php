<?php
function volver(){
echo "Alert";
/*   header('location: crea_sesiones.php');*/  
header("refresh:3;url=creo_sesion.php");

}

if (!isset($_GET['enviar'])){
  volver();
}

if ((isset($_GET['nombre']) && empty($_GET['nombre'])) || (isset($_GET['email']) && empty($_GET['email']))) {
    volver();
    exit();
}else{

  $nombre=$_GET['nombre'];
  $email=$_GET['email'];
  $myArray=['nombre' => $_GET['nombre'], 'email' => $_GET['email']];

  foreach ($myArray as $key => $value) {
    echo "<li>$key = $value </li>";
}
}
session_start();
setcookie("nombre", $nombre, time() + (60*60*24*365));
$_SESSION['nombre']= $nombre;
$_SESSION['email']= $email;
header("refresh:10;url=verifica_sesion.php");
