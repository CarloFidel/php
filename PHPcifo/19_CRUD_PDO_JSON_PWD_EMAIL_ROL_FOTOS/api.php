<?php

//Tutorial sobre $_FILES https://oreggom.com/php/files   

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'models/Connection.php';
require_once 'controllers/UsuarioController.php';

$controller = new UsuarioController();

// Si es una petición GET, devolvemos todos los usuarios
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo $controller->index();
    exit;
}

// Si es una petición POST, procesamos la acción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['foto'])){
     $action = $_POST['action'] ?? ''; //Es no valido? es un ternario que devuelve null si no hay nada
     if ($action === 'update_foto') {
      $id = $_POST['id'] ?? "";
      if (empty($id)){
       echo json_encode(['error' => 'ID no especificado']);
       exit;
      }

      $file = $_FILES['foto'];
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      $maxSize = 2 * 1024 * 1024; //2MB

      if (!in_array($file['type'], $allowedTypes)) {
       echo json_encode(['error' => 'Tipo de archivo no permitido. Use JPEG, PNG o GIF']);
       exit;
      }
      if ($file['size'] > $maxSize){
       echo json_encode(['error' => 'El archivo es demasiado grande. Máximo 2MB']);
       exit;
      }

      $extension = pathinfo($file['name'], PATHINFO_EXTENSION); //Solo queremos la extension
      $newFileName = uniid() . "." . $extension; // Es una funcion de PHP que genera un identificadoe único basado en la marca de tiempo atual en microsegundos. Por ejemplo, puede general algo como 643b1f5e5a3c7.
      $target_file = 'pictures/' . $newFileName;

      if (move_uploaded_file($file['tmp_name'], $target_file)){
       $foto_path = "pictures/" . basename($target_file);
       $resultado = $controller->updateFoto($id, $foto_path);
       echo json_encode($resultado);
      } else {
       echo json_encode(['error' => 'Error al subir el archivo']);
      }
      exit;
     }else if ($action === 'create'){
       if (!isset($_POST['nombre']) || !isset($_POST['usuario']) || !isset($_POST['email']) || !isset($_POST['password'])) {
        echo json_encode(['error' => 'Faltan campos requeridos']);
        exit;
     }

     $file = $_FILES['foto'];
     $foto_path = 'img/default_user.svg'; //Establecemos la ruta por defecto

     if ($file['size'] > 0) {
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      $maxSize = 2 * 1024 * 1024; //2MB

      if (!in_array($file['type'], $allowedTypes)) {
       echo json_encode(['error' => 'Tipo de archivo no permitido. Use JPEG, PNG o GIF']);
       exit;
     }
     if ($file['size'] > $maxSize) {
      echo json_encode(['error' => 'El archivo es demasiado grande. Máximo 2MB']);
      exit;
     }
     $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
     $newFileName = uniqid() . '.' . $extension;
     $target_file = 'pictures/' . $newFileName;

     if(move_uploaded_file($file['tmp_name'], $target_file)){
      $foto_path = "pictures/" . basename($target_file);
     } else {
      echo json_encode(['error' => 'Error al subir el archivo']);
      exit;
     }
     }
     $data = [
      'nombre' => $_POST['nombre'],
      'usuario' => $_POST['usuario'],
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'tipo_usuario' => $_POST['tipo_usuario'] ?? 2,
      'foto' => $foto_path
     ];
     $result = $controller->create($data);

     if(isset($result['error'])){
      http_response_code(400);
     }else {
      http_response_code(200);
     }
     echo json_encode($result);
     exit;
    } 
   } else if (isset($_POST['action']) && $_POST['action'] === 'create'){
     if(!isset($_POST['nombre']) || !isset($_POST['usuario']) || !isset($_POST['email']) || !isset($_POST['password'])) {
      echo json_encode(['error' => 'Faltan campos requeridos']);
      exit;
     }
    $data = [
      'nombre' => $_POST['nombre'],
      'usuario' => $_POST['usuario'],
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'tipo_usuario' => $_POST['tipo_usuario'] ?? 2,
      'foto' => 'img/defaul_user.svg'
     ];
     $result = $controller->create($data);

     if(isset($result['error'])){
      http_response_code(400);
     }else {
      http_response_code(200);
     }
     echo json_encode($result);
     exit;
    } 

   

   // Obtenemos el contenido del body
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Verificamos que la acción esté definida
    if (!isset($data['action'])) {
        echo json_encode(['error' => 'Acción no especificada']);
        exit;
    }
    
    // Procesamos según la acción
    switch ($data['action']) {            
        case 'update':
            // Validamos que el ID esté presente
            if (!isset($data['id'])) {
                echo json_encode(['error' => 'ID no especificado']);
                exit;
            }
            $result = $controller->update($data);    
            // Verificamos si el resultado contiene un error
            if (isset($result['error'])) {
                http_response_code(400); // Error
                echo json_encode($result);
            } else {
                http_response_code(200); // Éxito
                echo json_encode($result);
            }
            break;
            
        case 'delete':
            // Validamos que el ID exista
            if (!isset($data['id'])) {
                echo json_encode(['error' => 'ID no especificado']);
                exit;
            }  
            $result = $controller->delete($data);
            // Aseguramos que el resultado sea un array asociativo
            if (is_string($result)) {
                $result = json_decode($result, true);
            }
            echo json_encode($result);
            break;  
        default:
            echo json_encode(['error' => 'Acción no válida']);
            break;
    }
    exit;
}

// Si no es GET ni POST, devolvemos un error
echo json_encode(['error' => 'Método no permitido']);
?> 