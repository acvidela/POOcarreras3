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

    // Devuelve carreras ya realizadas
    public function anteriores() {
        $sql = "SELECT * FROM carreras WHERE fecha <= CURRENT_DATE ORDER BY fecha DESC";
        return Conexion::query($sql);
    }

    // Devuelve una carrera por id
    public function una($id) {
        $sql = "SELECT * FROM carreras WHERE id = $id";
        return Conexion::query($sql);
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
}
