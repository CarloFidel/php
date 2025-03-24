<?php
/* require_once "model/model.php";
 */require_once "assets/functions.php";
$nombre = sanadoreitor($_POST['nombre']);
$email = sanadoreitor($_POST['email']);


if ('ok' != $error) {
  header("Location: ../index.php?error=$error");
}
list($rows, $ok) = modeloRegistrarNuevoUsuario($nombre, $email, $con);

session_start();
$_SESSION['nombre'] = $nombre;
$_SESSION['email'] = $email;


require_once "views/feedback.php";
?>