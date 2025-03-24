<?php
// se supone que ha habido una conexion a la base de datos

function modeloRegistrarNuevoUsuario($usuario, $email)
{
      //recibe dos parametros si estan vacios devolvemos falso
      if (empty($usuario) || empty($email)) {
            return false;
      }
      
      $salida = "";
      // creamos $usuarios con el metodo fopen() metodo que abre ficheros, si no existe lo crea
      $usuarios = fopen("../model/usuarios.txt", "a+");//el primer prametro es el archivo donde actua y el segundo como actua, est es añade al final
      $usuarios = file("../model/usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//vamos al fichero file y nos lee el archivos (ignora file new lines y lineas vacias) estp es apara guardar de forma local


      //de cada linea creamos una descomposicion en dos user y email usando metodo list() y explode()
      foreach ($usuarios as $linea) {
            list($user, $em) = explode(" : ", $linea);//user:email

            if (($usuario === $user)||($email === $em)) return false; //si encuentra una coincidencia, devuelve un false

                   $salida .= $linea . "\n";
      }

      $salida .= "$usuario : $email";//si se completa guardamos los datos en salida

      file_put_contents("../model/usuarios.txt", $salida);//añadimos los datos con el metodo file_put_content

      echo nl2br($salida); //se imprime en n12br "new line to br"


      return true;


}
