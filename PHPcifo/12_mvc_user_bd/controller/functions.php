<?php

function saneadoreitor($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

//(trim($data))Elimina espacios en blanco al inicio y al final de la cadena. Previene problemas cuando los usuarios ingresan solo espacios o copian/pegan texto con espacios extra.

/*
 stripslashes($data)
Elimina las barras invertidas \ añadidas por addslashes().
Protege contra inyecciones de caracteres escapados en entornos donde magic_quotes_gpc podría estar activado (aunque ya está obsoleto en PHP 7+). */

/* htmlspecialchars($data)

    Convierte caracteres especiales en entidades HTML.
    Evita la inyección de código HTML o JavaScript, protegiendo contra ataques como XSS (Cross-Site Scripting). */