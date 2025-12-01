<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

/*
CREATE TABLE public.inscripciones (
	id serial4 NOT NULL,
	atleta_id int4 NOT NULL,
	carrera_id int4 NOT NULL,
	estado varchar(50) DEFAULT 'pendiente'::character varying NOT NULL,
	fecha_inscripcion timestamp DEFAULT now() NOT NULL,
	comprobante_pago varchar(255) NULL,
	pos_general int4 DEFAULT 0 NOT NULL,
	pos_categoria int4 DEFAULT 0 NOT NULL,
	categoria varchar(100) NULL,
	finalizo bool DEFAULT false NOT NULL,
	pechera int4 DEFAULT 0 NOT NULL,
	CONSTRAINT inscripciones_pkey PRIMARY KEY (id),
	CONSTRAINT fk_ins_atleta FOREIGN KEY (atleta_id) REFERENCES public.atletas(id) ON DELETE CASCADE,
	CONSTRAINT fk_ins_carrera FOREIGN KEY (carrera_id) REFERENCES public.carreras(id) ON DELETE CASCADE
);
*/

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
                       a.dni AS atleta_dni,
                       a.apellido AS atleta_apellido,
                       c.nombre AS carrera_nombre,
                       c.fecha AS carrera_fecha
                FROM inscripciones p
                JOIN atletas a ON p.atleta_id = a.id
                JOIN carreras c ON p.carrera_id = c.id
                ORDER BY p.fecha_inscripcion DESC";

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

    //Lista las preinscripciones pendientes de pago para futuras carreras
    public function pendientesFuturas() {
        $sql = "SELECT i.*, 
                   a.nombre AS atleta_nombre,
                   a.apellido AS atleta_apellido,
                   a.dni AS atleta_dni,
                   c.nombre AS carrera_nombre,
                   c.fecha AS carrera_fecha
            FROM inscripciones i
            JOIN atletas a ON i.atleta_id = a.id
            JOIN carreras c ON i.carrera_id = c.id
            WHERE i.estado = 'pendiente'
            AND c.fecha >= CURRENT_DATE
            ORDER BY c.fecha ASC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lista las preinscripciones pagadas aún no verificadas para futuras carreras
    public function pagadasFuturas() {
        $sql = "SELECT i.*, 
                   a.nombre AS atleta_nombre,
                   a.apellido AS atleta_apellido,
                   c.nombre AS carrera_nombre,
                   c.fecha
            FROM inscripciones i
            JOIN atletas a ON i.atleta_id = a.id
            JOIN carreras c ON i.carrera_id = c.id
            WHERE i.estado = 'pagado'
            AND c.fecha >= CURRENT_DATE
            ORDER BY c.fecha ASC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lista las inscripciones pagadas y confirmadas para futuras carreras
    public function confirmadasFuturas() {
        $sql = "SELECT i.*, 
                   a.nombre AS atleta_nombre,
                   a.apellido AS atleta_apellido,
                   c.nombre AS carrera_nombre,
                   c.fecha AS carrera_fecha

            FROM inscripciones i
            JOIN atletas a ON i.atleta_id = a.id
            JOIN carreras c ON i.carrera_id = c.id
            WHERE i.estado = 'inscripto'
            AND c.fecha >= CURRENT_DATE
            ORDER BY c.fecha ASC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lista todos los inscriptos que pagaron y están verificados en una carrera, ordenados por número de pechera
    public function inscriptosPorCarrera($carrera_id) {
         $sql = "SELECT i.*, 
                   a.nombre AS atleta_nombre,
                   a.apellido AS atleta_apellido,
                   c.nombre AS carrera_nombre
            FROM inscripciones i
            JOIN atletas a ON a.id = i.atleta_id
            JOIN carreras c ON c.id = i.carrera_id
            WHERE i.estado = 'inscripto'
            AND i.carrera_id = :carrera_id
            ORDER BY i.pechera ASC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute([':carrera_id' => $carrera_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Asigna un número de pechera dentro de la carrera. (incremental dentro de la carrera)
    public function obtenerSiguientePechera($carrera_id) {
         $sql = "SELECT COALESCE(MAX(pechera), 0) + 1 AS next_num
            FROM inscripciones
            WHERE carrera_id = :carrera_id";

        $stmt = Conexion::prepare($sql);
        $stmt->execute([':carrera_id' => $carrera_id]);
        return (int) $stmt->fetchColumn();
    }

    //Asigna la categoría dependiendo del género. Podría ampliarse luego con la edad
    public function asignarCategoriaPorGenero($id) {
        $sql = "SELECT a.genero
            FROM inscripciones i
            INNER JOIN atletas a ON i.atleta_id = a.id
            WHERE i.id = :id";

        $stmt = Conexion::getConexion()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si no existe retorno por defecto
        if (!$row) return "GENERAL";

        $genero = $row['genero'];

        if ($genero === 'M') return "CABALLERO";
        if ($genero === 'F') return "DAMA";

        return "GENERAL";
    }



    //Se produce la inscripción, está verificado el pago y aceptada
    public function confirmarInscripcion($id, $categoria, $pechera) {
        $sql = "UPDATE inscripciones
            SET categoria = :categoria,
                pechera = :pechera,
                estado = 'inscripto'
            WHERE id = :id";

        $stmt = Conexion::prepare($sql);
        return $stmt->execute([
            ':categoria' => $categoria,
            ':pechera' => $pechera,
            ':id' => $id
        ]);
    }

    public function aprobarInscripcion($inscripcion_id, $categoria, $pechera) {
        $sql = "UPDATE inscripciones
            SET estado = 'aprobado',
                categoria = :categoria,
                pechera = :pechera
            WHERE id = :id";

        $stmt = Conexion::prepare($sql);
        return $stmt->execute([
            ':categoria' => $categoria,
            ':pechera' => $pechera,
            ':id' => $inscripcion_id
        ]);
    }


    //Devuelve todas las inscripciones dependiendo de un estado ordenado por fecha de carrera
    public function obtenerPorEstado($estado) {
      $sql = "SELECT i.*, 
                   a.nombre AS atleta_nombre,
                   a.dni AS atleta_dni,
                   a.apellido AS atleta_apellido,
                   c.nombre AS carrera_nombre,
                   c.fecha AS carrera_fecha
            FROM inscripciones i
            INNER JOIN atletas a ON i.atleta_id = a.id
            INNER JOIN carreras c ON i.carrera_id = c.id
            WHERE i.estado = :estado
            ORDER BY c.fecha ASC";

        $stmt = Conexion::prepare($sql);
        $stmt->execute([':estado' => $estado]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
