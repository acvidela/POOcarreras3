<?php
require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class ResultadoModel {

    // Devuelve todos los que han terminado una carrera (los participantes de todas las carreras)
    public function todos() {
        $sql = 'SELECT * FROM resultados';
        return Conexion::query($sql);
    }
    
    public function insertar($inscripcionId, $tiempo, $posGeneral, $categoria, $posCategoria) {
        $sql = "INSERT INTO resultados (inscripcion_id, tiempo, pos_general, categoria, pos_categoria)
                VALUES (:inscripcion_id, :tiempo, :pos_general, :categoria, :pos_categoria)";
        
        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':inscripcion_id' => $inscripcionId,
            ':tiempo' => $tiempo,
            ':pos_general' => $posGeneral,
            ':categoria' => $categoria,
            ':pos_categoria' => $posCategoria
        ]);
    }

    //Todos los que están en una carrera. Admin o front
    public function traerPorCarrera($carreraId) {
        $sql = "SELECT r.*, a.nombre, a.apellido, i.dorsal
                FROM resultados r
                JOIN inscripciones i ON r.inscripcion_id = i.id
                JOIN atletas a ON i.atleta_id = a.id
                WHERE i.carrera_id = :carrera_id
                ORDER BY pos_general ASC";

        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ ':carrera_id' => $carreraId ]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function traerPorInscripcion($inscripcionId) {
        $sql = "SELECT * FROM resultados WHERE inscripcion_id = :id";
        
        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ ':id' => $inscripcionId ]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
