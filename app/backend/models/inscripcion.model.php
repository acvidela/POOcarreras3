<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class InscripcionModel {

     
    // Crear una preinscripción
    public function insertar($datos) {
        $sql = "INSERT INTO inscripciones (atleta_id, carrera_id, estado, comprobante_pago) 
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
                FROM inscripciones p
                JOIN atletas a ON p.atleta_id = a.id
                JOIN carreras c ON p.carrera_id = c.id
                ORDER BY p.fecha_preinscripcion DESC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una inscripción por ID
    public function uno($id) {
        $sql = "SELECT * FROM inscripciones WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar el estado (ej: pendiente → pagado)
    public function actualizarEstado($id, $estado) {
        $sql = "UPDATE inscripciones 
                SET estado = :estado 
                WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        return $stmt->execute([
            ':estado' => $estado,
            ':id' => $id
        ]);
    }

    // Eliminar una inscripción
    public function eliminar($id) {
        $sql = "DELETE FROM inscripciones WHERE id = :id";
        $stmt = Conexion::prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function obtenerCuponPorID($id)
    {
        $sql = "SELECT i.id, i.estado, 
                   a.nombre, a.apellido, a.dni,
                   c.nombre AS carrera_nombre,
                   c.fecha, c.precio
                FROM inscripciones i
                INNER JOIN atletas a ON i.atleta_id = a.id
                INNER JOIN carreras c ON i.carrera_id = c.id
                WHERE i.id = :id";

        $stmt = Conexion::getConexion()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
