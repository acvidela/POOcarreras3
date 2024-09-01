<?php 

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';
/*CREATE TABLE atletas (
	id serial NOT NULL,
	nombre varchar(255) NULL,
	fechadenacimiento date NULL,
	email varchar(255) NULL,
	CONSTRAINT atletas_pkey PRIMARY KEY (id)
);
*/

class Atleta{

//Devuelve todos los atletas registrados en el sistema
public function todos() {
    $db = Conexion::getConexion();
    $sql = "select * from atletas";
    $atletas = Conexion::query($sql);
    return $atletas;
}

//Devuelve un atleta en particular  
public function uno($id) {
    $sql = "SELECT *
                FROM atletas
                WHERE id = $id";

    $atleta = Conexion::query($sql);
    return $atleta;     
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
