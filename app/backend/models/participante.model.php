<?php 

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class Participante {
/*CREATE TABLE participantes (
	id serial NOT NULL,
	id_carrera int4 NULL,
	id_atleta int4 NULL,
	pago money NULL DEFAULT 0,
	pos_general int4 NULL DEFAULT 0,
	pos_categoria int4 NULL DEFAULT 0,
	categoria varchar NULL,
	finalizo bool NULL DEFAULT false,
	CONSTRAINT participantes_pk PRIMARY KEY (id)
);*/

//Devuelve todos los participantes 
public function todos() {
    $db = Conexion::getConexion();
    $sql = "select * from participantes";
    $participantes = Conexion::query($sql);
    return $participantes;
}

//Devuelve todos los participantes de una carrera en particular ordenados por posición general
//Muy útil para ver los resultados
public function todosEnCarrera($idCarrera){
    $db = Conexion::getConexion();
    $sql = "SELECT participantes.*, atletas.nombre
            FROM   participantes 
            JOIN   atletas 
            ON     participantes.id_atleta = atletas.id
            WHERE  participantes.id_carrera = " . $idCarrera . " 
            ORDER BY participantes.pos_general";
    $participantes = Conexion::query($sql);
    return $participantes;
}    

//Devuelve un participante

public function uno($id) {
    $sql = "SELECT *
                FROM participantes
                WHERE id = $id";

    $participante = Conexion::query($sql);
    return $participante;     
}

}

/*
function eliminar($id) {
    $sql = 'DELETE FROM tarea WHERE id = ?';
    $statement = $this->getDb()->prepare($sql);
    $statement->execute([$id]);
} 

function tarea_editar($datos) {

    $id = $datos['id'];
    $descripcion = $datos['descripcion'];
    $estado_id = $datos['estado_id'];

    $sql = 'UPDATE tarea 
                SET descripcion = ?, estado_id = ?
                WHERE id = ?';

    $statement = $this->getDb()->prepare($sql);
    $statement->execute([$descripcion, $estado_id, $id]);
}  

function tarea_insertar($datos) {

    $descripcion = $datos['descripcion'];
    $estado_id = $datos['estado_id'];

    $sql = 'INSERT INTO tarea (descripcion, estado_id) 
            VALUES (?, ?)';

    $statement = $this->getDb()->prepare($sql);
    $statement->execute([$descripcion, $estado_id]);
}     

 */      
