<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';
/*
CREATE TABLE public.atletas (
	id serial4 NOT NULL,
	nombre varchar(255) NULL,
	fechadenacimiento date NULL,
	email varchar(255) NULL,
	apellido varchar(255) NULL,
	dni varchar(20) NULL,
	telefono varchar(30) NULL,
	genero varchar(50) NULL,
	CONSTRAINT atletas_pkey PRIMARY KEY (id)
);
*/

class Atleta {

    // Obtener todos los atletas
    public function todos() {
        $sql = "SELECT * FROM atletas ORDER BY apellido, nombre";
        return Conexion::query($sql);
    }

    // Obtener atleta por ID
    public function uno($id) {
        $sql = "SELECT * FROM atletas WHERE id = $id";
        return Conexion::query($sql);
    }

    // Buscar atleta por DNI (evita duplicados)
    public function buscarPorDni($dni) {
        $sql = "SELECT * FROM atletas WHERE dni = '$dni'";
        return Conexion::query($sql);
    }

    public function insertarYDevolverID($data) {

        $sql = "
            INSERT INTO atletas (nombre, apellido, fechadenacimiento, email, dni, telefono, genero)
            VALUES (:nombre, :apellido, :fechadenacimiento, :email, :dni, :telefono, :genero)
            RETURNING id
        ";

        $stmt = Conexion::prepare($sql);
        $stmt->execute([
            ':nombre' => $data['nombre'],
            ':apellido' => $data['apellido'],
            ':fechadenacimiento' => $data['fechadenacimiento'],
            ':email' => $data['email'],
            ':dni' => $data['dni'],
            ':telefono' => $data['telefono'],
            ':genero' => $data['genero']
        ]);

        return $stmt->fetchColumn(); // devuelve el id para poder insertarlo como FK en preinscripción
    }

    // Actualizar atleta
    public function actualizar($id, $data) {

        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $fecha = $data['fechadenacimiento'];
        $email = $data['email'];
        $dni = $data['dni'];
        $telefono = $data['telefono'];
        $genero = $data['genero'];

        $sql = "
            UPDATE atletas SET
                nombre = '$nombre',
                apellido = '$apellido',
                fechadenacimiento = '$fecha',
                email = '$email',
                dni = '$dni',
                telefono = '$telefono',
                genero = '$genero'
            WHERE id = $id
        ";

        return Conexion::query($sql);
    }

    // Eliminar atleta
    public function eliminar($id) {
        $sql = "DELETE FROM atletas WHERE id = $id";
        return Conexion::query($sql);
    }
}

