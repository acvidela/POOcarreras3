<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class Carrera {
    // Devuelve todas las carreras
    public function todas() {
        $sql = 'SELECT * FROM carreras';
        return Conexion::query($sql);
    }

    // Devuelve carreras por realizarse
    public function proximas() {
        $sql = "SELECT * FROM carreras WHERE fecha >= CURRENT_DATE";
        return Conexion::query($sql);
    }

    
    //Admin/Front: Lista las carreras previas a HOY
    public function listarAnteriores() {
        $sql = "SELECT *
            FROM carreras
            WHERE fecha < CURRENT_DATE
            ORDER BY fecha DESC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
     //Admin: Lista las carreras futuras a partir de hoy
    public function listarFuturas() {
        $sql = "SELECT c.*
            FROM carreras c
            WHERE c.fecha >= CURRENT_DATE";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function anteriores() {
        $sql = "SELECT * FROM carreras WHERE fecha <= CURRENT_DATE ORDER BY fecha DESC";

        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    // Devuelve una carrera por id
    public function una($id) {
        $sql = "SELECT * FROM carreras WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        if ($stmt) {
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    // Inserta una carrera
    public function insertar($datos) {
        $sql = "INSERT INTO carreras (nombre, circuito, fecha, precio) VALUES (:nombre, :circuito, :fecha, :precio)";
        $stmt = Conexion::prepare($sql);
        if ($stmt) {
            $stmt->execute([
                ':nombre' => $datos['nombre'],
                ':circuito' => $datos['circuito'],
                ':fecha' => $datos['fecha'],
                ':precio' => $datos['precio'],
            ]);
        }
    }

    // Actualiza una carrera existente
    public function actualizar($id, $datos) {
        $sql = "UPDATE carreras
                SET nombre = :nombre,
                    circuito = :circuito,
                    fecha = :fecha,
                    precio = :precio
                WHERE id = :id";

        $stmt = Conexion::prepare($sql);
        if ($stmt) {
            $stmt->execute([
                ':nombre' => $datos['nombre'],
                ':circuito' => $datos['circuito'],
                ':fecha' => $datos['fecha'],
                ':precio' => $datos['precio'],
                ':id' => $id,
            ]);
        }
    }

    // Elimina una carrera
    public function eliminar($id) {
        $sql = "DELETE FROM carreras WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        if ($stmt) {
            $stmt->execute([':id' => $id]);
        }
    }
}
