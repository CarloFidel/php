<?php
require 'assets/function.php';

// Start the session
session_start();
echo $normal_var;
echo "<br>";

/* // Check if session_var1 is set before displaying it
if (isset($_SESSION['session_var1'])) {
    echo $_SESSION['session_var1'];
} else {
    echo "session_var1 is not set.";
}
 */
echo "<br>";
echo $_SESSION['session_var1'];

$numero = 456454564565.456;
$_SESSION['session_var2'] = $numero;

pDump($_SESSION);
echo "<br>";
?>

<!-- Links to navigate between pages -->
<a href="intr_var_sesion.php">ir a la intro de las variables de sesión</a> || 
<a href="mas_vars_sesion.php">ir a más variables de sesión</a>
