<?php 
function configurarcarpetaPermisos(){
  $carpeta='picture';
//function para configurar los permisos de la carpeta pictures
  if(!file_exists($carpeta)){
    if(!mkdir($carpeta, 0777, true)) {
      die('Fallo al crear las carpetas...');
    }
}

//Verificar si la carpeta existe
if(chmod($carpeta, 0777)){
  echo "Permisos de la carpeta $carpeta configurados correctamente.";


}else{
  echo "Error al configurar los permisos de la carpeta $carpeta.";
  echo "Puede que necesirtes ejecutar este script con permisiso del adm";
}
}
configurarcarpetaPermisos();