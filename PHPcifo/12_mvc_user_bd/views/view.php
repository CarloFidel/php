<?php
/*
function vistaRegistroCompletado($usuario, $email)
{
?>
<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="UTF-8">
      <title>Document</title>
</head>

<body>
      <h3>Gracias por registrarse. Dispone del usuario <?php echo $usuario; ?>.</h3>
      <p>Recibirá un correo en la siguiente dirección : <?php echo $email; ?> </p>

</body>

</html>
<?php
}
*/

function vistaRegistroCompletado($usuario, $email) //Recibe $usuario y $email como parámetros. Crea un array $params con los datos del usuario. Llama a mostrarTpls($params, "../view/tpls/feedback.tpl"), que probablemente: Carga una plantilla (feedback.tpl) ubicada en ../view/tpls/. Sustituye los valores dentro de la plantilla usando $params.
{
      $params = [
            "usuario" => $usuario,
            "email" => $email,
      ];
      mostrarTpls($params, "../views/tpls/feedback.tpl");
}

function vistaRegistroIncorrecto($usuario, $email) //ecibe los datos del usuario y los pasa a _vista_form_registro(), junto con false para indicar que el registro falló. Probablemente _vista_form_registro(): Muestra nuevamente el formulario de registro. Indica que hubo un error (ejemplo: usuario ya existe)
{
      _vista_form_registro($usuario, $email, false);
}

function vistaMostrarFormularioRegistro()//llama a _vista_form_registro() con:"" (usuario vacío) "" (email vacío) true (indica que es la primera carga del formulario, sin errores previos).
{
      _vista_form_registro("", "", true);
}
/* 
function _vista_form_registro($usuario, $email, $primera_vez)
{
?>
<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="UTF-8">
      <title>Users fichero</title>
      <style type="text/css">
      .error {
            border: 2px solid red;
      }
      </style>

</head>

<body>
      <form method="post" action="../controller/app.php">
            Usuario: <br><input type="text" class="<?php echo !$primera_vez ? 'error' : '' ?>" name="usuario"
                  value="<?php echo $usuario; ?>" /><br><br>
            Email: <br><input type="text" class="<?php echo !$primera_vez ? 'error' : '' ?>" name="email"
                  value="<?php echo $email; ?>" /><br><br>
            <input type="submit" name="registrar" value="Registrar" /><br>

            <?php
                  if (!$primera_vez) {

                        echo "El formulario contiene errores. Corrígelos y vuelve a intentarlo.";
                  }
                  ?>
      </form>

</body>

</html>
<?php

}
 */
function _vista_form_registro($usuario, $email, $primera_vez) //Determina si el formulario tiene errores

   // Si $primera_vez es true, es la primera carga del formulario y no hay error.
  /*   Si $primera_vez es false, hubo un error en el registro:
        Se asigna "error" a $class_error.
        Se establece un mensaje de error en $mensaje_error. */
{
      $mensaje_error = "";
      $class_error = "";

      if (!$primera_vez) {
            $class_error = "error";
            $mensaje_error = "El formulario contiene errores. Corrígelos y vuelve a intentarlo.";
      }

      $params = [ //    Incluye el usuario y el email (para mantener los valores ingresados). Contiene una clase CSS para errores (class_error). Mensaje de err(mensaje_error). Llama a mostrarTpls($params, "../view/tpls/form.tpl") Se pasa $params para reemplazar valores en la plantilla form.tpl.
            "usuario" => $usuario,
            "email" => $email,
            "class_error" => $class_error,
            "mensaje_error" => $mensaje_error,
      ];

      mostrarTpls($params, "../views/tpls/form.tpl");
}

function mostrarTpls($params, $archivo){

      $html = file_get_contents($archivo); 
      foreach ($params as $key => $value) {
            $html = str_replace("{{::$key::}}", $value, $html);
      }
      //var_dump($html);
      echo $html;
}

/* Resumen del Funcionamiento

    _vista_form_registro():
        Determina si hay error.
        Prepara los datos para la plantilla.
        Llama a mostrarTpls().
    mostrarTpls():
        Carga form.tpl.
        Sustituye los marcadores con los valores del formulario.
        Muestra el formulario con los datos inyectados.

🔹 Este método separa la lógica del formulario y la vista, facilitando el mantenimiento y la reutilización del código. 🚀 */