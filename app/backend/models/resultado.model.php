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

    // Todos los que están en una carrera. Admin o front. Calcula posición por categoría para mostrar (no se almacena)
    public function traerPorCarrera($carreraId) {
        $sql = "SELECT 
                    r.*, 
                    a.nombre, 
                    a.apellido, 
                    i.dorsal,
                    ROW_NUMBER() OVER (PARTITION BY r.categoria ORDER BY r.tiempo ASC) AS pos_categoria
                FROM resultados r
                JOIN inscripciones i ON r.inscripcion_id = i.id
                JOIN atletas a ON i.atleta_id = a.id
                WHERE i.carrera_id = :carrera_id
                ORDER BY r.pos_general ASC";

        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':carrera_id' => $carreraId]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function traerPorInscripcion($inscripcionId) {
        $sql = "SELECT * FROM resultados WHERE inscripcion_id = :id";
        
        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ ':id' => $inscripcionId ]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //Busca y devuelve por número de dorsal para cargar resultados
    public function buscarInscripcionPorDorsal($carrera_id, $dorsal) {
        $sql = "SELECT * FROM inscripciones 
                WHERE carrera_id = ? AND dorsal = ?";
        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$carrera_id, $dorsal]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Busca y devuelve la categoría (Damas / Caballeros) según la inscripción
    public function buscarCategoriaPorInscripcion($inscripcion_id) {
        $sql = "SELECT 
                    CASE 
                        WHEN a.genero = 'F' THEN 'Damas'
                        WHEN a.genero = 'M' THEN 'Caballeros'
                    END AS categoria
                FROM inscripciones i
                JOIN atletas a ON i.atleta_id = a.id
                WHERE i.id = :inscripcion_id";

        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['inscripcion_id' => $inscripcion_id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $row['categoria'] : null;
    }
      
        
    //Guarda los resultados desde un .cvs
    public function guardarResultado($inscripcion_id, $tiempo, $posGeneral, $categoria) {
        $sql = "INSERT INTO resultados (inscripcion_id, tiempo, pos_general, categoria)
                VALUES (?, ?, ?, ?)
                ON CONFLICT (inscripcion_id)
                DO UPDATE SET tiempo = EXCLUDED.tiempo,
                            pos_general = EXCLUDED.pos_general";

        $pdo = Conexion::getConexion();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$inscripcion_id, $tiempo, $posGeneral, $categoria]);
    }

}
