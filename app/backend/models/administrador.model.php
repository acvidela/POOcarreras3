<?php 

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

/*CREATE TABLE administradores (
    id INT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    clave VARCHAR(255) NOT NULL
);
*/

class AdministradorModel{

//Devuelve todos los administradores registrados en el sistema
public function todos() {
    $db = Conexion::getConexion();
    $sql = "select * from administradores";
    $administradores = Conexion::query($sql);
    return $administradores;
}

//Devuelve un administrador en particular  
public function uno($id) {
    $sql = "select *
                FROM administradores
                WHERE id = $id";
    $administrador = Conexion::query($sql);
    return $administrador;     
}

private function encryptPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

public function administrador_insertar($datos) {
    $usuario = $datos['usuario'];
    $clave = $datos['clave'];

    // Verificar si el usuario ya existe
    $sqlCheck = "SELECT COUNT(*) as total FROM administradores WHERE usuario = ?";
    $stmtCheck = Conexion::prepare($sqlCheck);
    $stmtCheck->execute([$usuario]);
    $existe = $stmtCheck->fetch(PDO::FETCH_OBJ)->total;

    if ($existe > 0) {
        echo "Error: El usuario '$usuario' ya existe.";
        return false; // No insertamos nada
    }

    // Asegurar que la contraseña se encripta antes de guardarla
    $hashedPassword = $this->encryptPassword($clave);

    $sql = 'INSERT INTO administradores (usuario, clave) VALUES (?, ?)';
    $stmt = Conexion::prepare($sql);
    $stmt->execute([$usuario, $hashedPassword]);

    echo "Usuario '$usuario' registrado correctamente.";
    return true;
}

public static function verificarCredenciales($usuario, $clave) {
    $sql = "SELECT * FROM administradores WHERE usuario = ?";
    $stmt = Conexion::prepare($sql);
    $stmt->execute([$usuario]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica que el usuario existe y que la contraseña es válida
    if ($admin && password_verify($clave, $admin['clave'])) {
        return $admin;  // Retorna los datos del administrador si es correcto
    } else {
        return false; // Retorna false si la autenticación falla
    }
}

}
/*
//Para insertar directamente los usuarios por consola. Escribir php ruta a este archivo, luego comentar
$admin = new AdministradorModel();
$admin->administrador_insertar([
    'usuario' => 'admin1',
    'clave' => 'clave1'
]);
$admin->administrador_insertar([
    'usuario' => 'admin2',
    'clave' => 'clave2'
]);
*/

