<?php 

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class Carrera{

//Devuelve todas las carreras con el id kit
public function todas() {
    $db = Conexion::getConexion();
    $sql = "select * from carreras";
    $carreras = Conexion::query($sql);
    return $carreras;
}

//Devuelve todas las carreras por realizarse con el id kit
public function proximas() {
    $db = Conexion::getConexion();
    $sql = "select * from carreras 
             WHERE fecha >= CURRENT_DATE";
    $carreras = Conexion::query($sql);
    return $carreras;
}
   
//Devuelve todas las carreras ya realizadas con el id kit
public function anteriores() {
    $db = Conexion::getConexion();
    $sql = "select * from carreras 
             WHERE fecha <= CURRENT_DATE
             ORDER by fecha DESC";
    $carreras = Conexion::query($sql);
    return $carreras;
}

//Devuelve una carrera en particular  

public function una($id) {
    $db = Conexion::getConexion();
    $sql = "SELECT *
                FROM carreras
                WHERE id = $id";

    $carrera = Conexion::query($sql);
    return $carrera;     
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
