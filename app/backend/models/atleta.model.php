<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';
/*
CREATE TABLE atletas (
    id serial NOT NULL,
    nombre varchar(255) NULL,
    fechadenacimiento date NULL,
    email varchar(255) NULL,
    CONSTRAINT atletas_pkey PRIMARY KEY (id)
);
*/

class Atleta {
    // Devuelve todos los atletas
    public function todos() {
        $sql = 'SELECT * FROM atletas';
        return Conexion::query($sql);
    }

    // Devuelve un atleta por id
    public function uno($id) {
        $sql = "SELECT * FROM atletas WHERE id = $id";
        return Conexion::query($sql);
    }
}
