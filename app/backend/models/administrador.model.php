<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

/*
CREATE TABLE administradores (
    id INT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    clave VARCHAR(255) NOT NULL
);
*/

class AdministradorModel {
    // Devuelve todos los administradores
    public function todos() {
        $sql = 'SELECT * FROM administradores';
        return Conexion::query($sql);
    }

    // Devuelve un administrador por id
    public function uno($id) {
        $sql = "SELECT * FROM administradores WHERE id = $id";
        return Conexion::query($sql);
    }

    private function encryptPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function insertar($datos) {
        $usuario = $datos['usuario'];
        $clave = $datos['clave'];

        // Verificar si el usuario ya existe
        $sqlCheck = 'SELECT COUNT(*) as total FROM administradores WHERE usuario = ?';
        $stmtCheck = Conexion::prepare($sqlCheck);
        $stmtCheck->execute([$usuario]);
        $existe = $stmtCheck->fetch(PDO::FETCH_OBJ)->total;

        if ($existe > 0) {
            echo "Error: El usuario '$usuario' ya existe.";
            return false;
        }

        // Encriptar contrasena antes de guardarla
        $hashedPassword = $this->encryptPassword($clave);

        $sql = 'INSERT INTO administradores (usuario, clave) VALUES (?, ?)';
        $stmt = Conexion::prepare($sql);
        $stmt->execute([$usuario, $hashedPassword]);

        echo "Usuario '$usuario' registrado correctamente.";
        return true;
    }

    public static function verificarCredenciales($usuario, $clave) {
        $sql = 'SELECT * FROM administradores WHERE usuario = ?';
        $stmt = Conexion::prepare($sql);
        $stmt->execute([$usuario]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Valida que el usuario exista y la contrasena coincida
        if ($admin && password_verify($clave, $admin['clave'])) {
            return $admin;
        }

        return false;
    }
}

/*
// Para insertar usuarios por consola
$admin = new AdministradorModel();
$admin->insertar([
    'usuario' => 'admin1',
    'clave' => 'clave1',
]);
$admin->insertar([
    'usuario' => 'admin2',
    'clave' => 'clave2',
]);
*/
