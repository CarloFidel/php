<?php

$pw = password_hash("oscareroles", PASSWORD_DEFAULT, ["cost" => 10]);
echo "encriptado: " . $pw . "<br>";

if (password_verify('oscareroles', $pw)) {// password de 11 caractres
    var_dump(password_verify('oscareroles', $pw));
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
 

$pw = password_hash("santiperolillos", PASSWORD_DEFAULT, ["cost" => 10]);
echo "encriptado: " . $pw . "<br>";

if (password_verify('santiperolillos', $pw)) {// password de 11 caractres
    var_dump(password_verify('santiperolillos', $pw));
    echo 'La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
 