<?php
// Número de fotos a descargar
$numFotos = 40;

// URL base de randomuser.me
$baseUrl = "https://randomuser.me/api/portraits/";

// Crear la carpeta assets si no existe
if (!file_exists('assets')) {
    mkdir('assets', 0777, true);
}

// Descargar fotos
for ($i = 1; $i <= $numFotos; $i++) {
    // Generar un número aleatorio para el género (1 = hombres, 2 = mujeres)
    $gender = rand(1, 2);
    $genderText = ($gender == 1) ? 'men' : 'women';
    
    // Generar un número aleatorio para el ID de la foto (1-99)
    $photoId = rand(1, 99);
    
    // Construir la URL de la foto
    $photoUrl = $baseUrl . $genderText . '/' . $photoId . '.jpg';
    
    // Nombre del archivo local
    $localFile = 'assets/user_' . $i . '.jpg';
    
    // Descargar la foto
    $photoContent = file_get_contents($photoUrl);
    
    if ($photoContent !== false) {
        // Guardar la foto
        if (file_put_contents($localFile, $photoContent)) {
            echo "Foto $i descargada correctamente: $localFile\n";
        } else {
            echo "Error al guardar la foto $i\n";
        }
    } else {
        echo "Error al descargar la foto $i desde $photoUrl\n";
    }
    
    // Pequeña pausa para no sobrecargar el servidor
    usleep(100000); // 0.1 segundos
}

echo "Proceso completado. Se han descargado $numFotos fotos en la carpeta assets.\n";
?> 