<?php
function configurarPermisosCarpeta(){
 $carpeta = 'pictures';

 // Verificar si existe
 if (!file_exists($carpeta)) {
  if (!mkdir($carpeta, 0777, true)) {
   die("Error: No se pudo crear la carpeta $carpeta");
  }
 }

// Intenta cambiar los permisos
if(chmod($carpeta, 0777)){
 echo "Permisos configurados correctamente para la carpeta $carpeta\n";
} else {
 echo "Error: No se pudieron configurar los permisos para la carpeta $carpeta\n";
 echo "Puede que necesistes ejecturar este script con permisos de asministrador\n";
}
}

configurarPermisosCarpeta();