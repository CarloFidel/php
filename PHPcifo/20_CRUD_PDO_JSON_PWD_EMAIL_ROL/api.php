<?php
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
    // Obtenemos el contenido del body
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Verificamos que la acción esté definida
    if (!isset($data['action'])) {
        echo json_encode(['error' => 'Acción no especificada']);
        exit;
    }
    
    // Procesamos según la acción
    switch ($data['action']) {
        case 'create':
            // Validamos que todos los campos requeridos estén presentes
            if (!isset($data['nombre']) || !isset($data['apellido']) || !isset($data['email']) || !isset($data['password'])) {
                echo json_encode(['error' => 'Faltan campos requeridos']);
                exit;
            }       
            // Validamos el tipo de usuario
            if (!isset($data['tipo_usuario']) || !in_array($data['tipo_usuario'], [1, 2])) {
                $data['tipo_usuario'] = 2; // Por defecto
            }     
            $result = $controller->create($data);     
            // Verificamos si el resultado contiene un error
            if (isset($result['error'])) {
                http_response_code(400); // Establecemos un código de error
                echo json_encode($result);
            } else {
                http_response_code(200); // Establecemos un código de éxito
                echo json_encode($result);
            }
            break;
            
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