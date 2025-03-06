
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <code>
    <pre>
<?php

/* la cookie es un fichero que se almacena en el ordenador del usuario, con el fin de recordar datos o rastrear eñ comportamiento del mismo en la web */

//Crea una cookie
//setcookie("nombre), "valor que solo puede ser texto", caducidad, ruta, dominio);

//Cookiee básica, dra lo que dura una sesión
/* setcookie("micookie"), "valor de mi galleta"); */

//Cookie con expiración

setcookie("unyear", "Cookie de 365 días", time() + (60 * 60 * 24 * 365));

setcookie("contador", $_COOKIE['contador'] + 1, time() +10);
var_dump($_COOKIE);
?>
</code>
</pre>
</body>
</html>
