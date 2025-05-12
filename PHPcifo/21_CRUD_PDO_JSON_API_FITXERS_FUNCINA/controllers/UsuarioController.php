<?php
require_once 'models/Connection.php';
require_once 'models/Usuario.php';

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct() {
        $connection = new Connection();
        $this->db = $connection->getConnection();
        $this->usuario = new Usuario($this->db);
    }

      private function contarEditores(){
      $query = "SELECT COUNT(*) as total FROM datos_usuarios WHERE tipo_usuario = 1";
      $stmt =$this->db->prepare($query);
      $stmt->execute();
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      return $resultado['total'];
    }

    private function validarLimiteEditores($nuevoTipo, $idActual = null) {
    if ($nuevoTipo == 1) {
        $editoresActuales = $this->contarEditores();

        if ($idActual) {
            $query = "SELECT tipo_usuario FROM datos_usuarios WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $idActual);
            $stmt->execute();
            $usuarioActual = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si el usuario actual ya es editor, no contamos su cambio
            if ($usuarioActual && $usuarioActual['tipo_usuario'] == 1) {
                return true;
            }
        }

        if ($editoresActuales >= 3) {
            return false;
        }
    }
    return true;
}

    public function index() {
        $query = "SELECT * FROM datos_usuarios WHERE tipo_usuario !=3";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($usuarios);
    }

    public function create($data) {
      
        // Validar datos
  
         if(!$this->validarLimiteEditores($data['tipo_usuario'] ?? 2)){
          return ["error" => "No se pueden tener mas de 3 editores. Convierta algun editor a tipo Registrado primero"];
        } 


        $nombre = trim($data['nombre_apellidos'] ?? '');
        if ($nombre === '') {
        return ["error" => "El nombre no puede estar vacío."];
        }
        else if(strlen($nombre) < 5 || strlen($nombre)>30) {
         return ["error" => "El nombre debe tener entre 5 y 30 carácteres."];
        }
        elseif (preg_match('/\d/', $nombre)) {
        return ["error" => "El nombre no debe contener numeros."];
        }
        
       //validar usuario
       $usuario = trim($data['usuario']??'');
       if($usuario === ''){
        return ['error' =>"El usuario no puede estar vacío"];
       }
       elseif(strlen($usuario)<5 || strlen($usuario)>8){
        return ["error" =>"El usuario debe tener entre 5 y 8 carácteres"];
       }

       //validar email
      $email = trim($data['email'] ?? '');
       if ($email === '') {
      return ["error" => "El correo electrónico es obligatorio."];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["error" => "El formato del correo electrónico no es válido."];
    }

       //validar password
       $password = trim($data['password'] ?? '');
       if($password ===''){
        return ["error" => "La contraseña no puede estar vacía"];
       }
       elseif(strlen($password)<6 || strlen($password)>10){
        return['error' => 'La contraseña debe tener entre 6 y 10 carácteres'];
       }
       else if(!preg_match('/\d/', $password)){
        return ["error" => "La contraseña debe incluir al menos un número"];
       }
      
       //validar tipoUsuario


       $tipoUsuario = $data['tipo_usuario'];
        

      
        // Asignar valores
        $this->usuario->nombre_apellidos = $nombre;
        $this->usuario->usuario = $usuario;
        $this->usuario->email = $email;
        $this->usuario->password = password_hash($password, PASSWORD_DEFAULT,["cost" => 14]);
        $this->usuario->tipo_usuario = $tipoUsuario; // Por defecto es usuario registrado
        $this->usuario->foto = $data['foto'] ?? null; // Asignar la foto si existe

        if($this->usuario->create()) {
            return ["mensaje" => "Usuario creado correctamente"];
        }
        return ["error" => "No se pudo crear el usuario"];
    }

    public function update($data) {
        if(empty($data['id'])) {
            return ["error" => "ID es requerido"];
        }

         if(!$this->validarLimiteEditores($data['tipo_usuario'] ?? 2, $data['id'])){
          return ["error" => "No se pueden tener mas de 3 editores. Convierta algun editor a tipo Registrado primero"];
        }

        //validar nombre
         $nombre = trim($data['nombre_apellidos'] ?? '');
        if ($nombre === '') {
        return ["error" => "El nombre no puede estar vacío."];
        }
        else if(strlen($nombre) < 5 || strlen($nombre)>30) {
         return ["error" => "El nombre debe tener entre 5 y 30 carácteres."];
        }
        elseif (preg_match('/\d/', $nombre)) {
        return ["error" => "El nombre no debe contener numeros."];
        }

        //validar usuario
        $usuario = trim($data['usuario']??'');
       if($usuario === ''){
        return ['error' =>"El usuario no puede estar vacío"];
       }
       elseif(strlen($usuario)<5 || strlen($usuario)>8){
        return ["error" =>"El usuario debe tener entre 5 y 8 carácteres"];
       }

        // Validar email
         $email = trim($data['email'] ?? '');
         if ($email === '') {
        return ["error" => "El correo electrónico es obligatorio."];
       } 
       elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ["error" => "El formato del correo electrónico no es válido."];
    }

    $tipoUsuario = $data['tipo_usuario'];


        $this->usuario->id = $data['id'];
        $this->usuario->nombre_apellidos = $nombre;
        $this->usuario->usuario = $usuario;
        $this->usuario->email = $email;
        
        if(!empty($data['password'])) {
            $this->usuario->password = password_hash($data['password'], PASSWORD_DEFAULT,["cost" => 14]);
        }
        
        if(isset($data['tipo_usuario'])) {
            $this->usuario->tipo_usuario = $data['tipo_usuario'];
        }

        if($this->usuario->update()) {
            return ["mensaje" => "Usuario actualizado correctamente"];
        }
        return ["error" => "No se pudo actualizar el usuario"];
    }

    public function delete($data) {
        $this->usuario->id = $data['id'];

        if ($this->usuario->delete()) {
            return ["mensaje" => "Usuario eliminado correctamente"];
        }
        return ["error" => "No se pudo eliminar el usuario"];
    }

    public function updateFoto($id, $fotoPath) {
        $this->usuario->id = $id;
        $this->usuario->foto = $fotoPath;

        if($this->usuario->updateFoto()) {
            return ["mensaje" => "Foto actualizada correctamente"];
        }
        return ["error" => "No se pudo actualizar la foto"];
    }



    public function login($email, $password) {
        $query = "SELECT * FROM datos_usuarios WHERE email = :email AND tipo_usuario = 3 LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['adminLoggedIn'] = true;  
                return ['success' => true];
            }
        }
    
        return ['success' => false, 'error' => 'Credenciales incorrectas'];
    }
}
?> 