<?php 

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class Participante {


//Devuelve todos los participantes 
public function todos() {
    $db = Conexion::getConexion();
    $sql = "select * from participantes";
    $participantes = Conexion::query($sql);
    return $participantes;
}

//Devuelve todos los participantes de una carrera en particular 
//Muy útil para ver los resultados
public function todosEnCarrera($idCarrera){
    $sql = "select * from participantes
            where id_carrera = ".$idCarrera;
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
