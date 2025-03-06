<?php
session_start();//Iniciar sesion
echo $_SESSION['session_var1'];
echo "<br>";

echo $_SESSION['session_var2'];
echo"<br>";
?>
<a href="intr_var_session.php">ir a la intro de las variables de seeion</a>  ||
<a href="uso_var_sesion.php">ir a mas variables de seeion</a>
<?php session_destroy();?>
