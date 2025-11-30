<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class PreinscripcionModel {

     
    // Crear una preinscripción
    public function insertar($datos) {
        $sql = "INSERT INTO preinscripciones (atleta_id, carrera_id, estado, comprobante_pago) 
            VALUES (:atleta_id, :carrera_id, :estado, :comprobante_pago)
            RETURNING id";

        $stmt = Conexion::prepare($sql);

         $stmt->execute([
            ':atleta_id' => $datos['atleta_id'],
            ':carrera_id' => $datos['carrera_id'],
            ':estado' => $datos['estado'] ?? 'pendiente',
            ':comprobante_pago' => $datos['comprobante_pago'] ?? null
        ]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return (isset($resultado['id']) ? (int)$resultado['id'] : null);
    }



    // Obtener todas las preinscripciones
    public function todos() {
        $sql = "SELECT p.*, 
                       a.nombre AS atleta_nombre,
                       a.apellido AS atleta_apellido,
                       c.nombre AS carrera_nombre
                FROM preinscripciones p
                JOIN atletas a ON p.atleta_id = a.id
                JOIN carreras c ON p.carrera_id = c.id
                ORDER BY p.fecha_preinscripcion DESC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una preinscripción por ID
    public function uno($id) {
        $sql = "SELECT * FROM preinscripciones WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar el estado (ej: pendiente → pagado)
    public function actualizarEstado($id, $estado) {
        $sql = "UPDATE preinscripciones 
                SET estado = :estado 
                WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        return $stmt->execute([
            ':estado' => $estado,
            ':id' => $id
        ]);
    }

    // Eliminar una preinscripción
    public function eliminar($id) {
        $sql = "DELETE FROM preinscripciones WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function obtenerCuponPorID($id)
    {
        $sql = "SELECT p.id, p.estado, 
                   a.nombre, a.apellido, a.dni,
                   c.nombre AS carrera_nombre,
                   c.fecha, c.precio
                FROM preinscripciones p
                INNER JOIN atletas a ON p.atleta_id = a.id
                INNER JOIN carreras c ON p.carrera_id = c.id
                WHERE p.id = :id";

        $stmt = Conexion::getConexion()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
