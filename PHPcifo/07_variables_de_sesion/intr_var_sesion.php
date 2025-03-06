<?php
require 'assets/function.php';

/* 
Sesion: Almacena datos mientras navegas en un sitio hasta que cierras sesión, sales del dominio que la ha creado, o cierras el navegador.
*/

echo $normal_var;

// Start the session or maintain it if it's already started
session_start(); 

// Store a session variable
$_SESSION['session_var1'] = 'Yo soy una variable de sesión';

// Output the current session variables
pDump($_SESSION);
echo "<br>";

// Access and output a specific session variable
echo $_SESSION['session_var1'];
echo "<br>";

// Assign a value to 'session_var2' as well
$_SESSION['session_var2'] = 'Otra variable de sesión';

pDump($_SESSION);
?>

<!-- Links to other pages that presumably work with session variables -->
<a href="uso_var_session.php">ir a uso de variables de sesión</a> || 
<a href="mas_var_session.php">ir a más variables de sesión</a>
