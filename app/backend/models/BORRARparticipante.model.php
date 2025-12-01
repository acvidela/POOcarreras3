<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\config\conexion.php';

class Participante {
    /*
    CREATE TABLE participantes (
        id serial NOT NULL,
        id_carrera int4 NULL,
        id_atleta int4 NULL,
        pago money NULL DEFAULT 0,
        pos_general int4 NULL DEFAULT 0,
        pos_categoria int4 NULL DEFAULT 0,
        categoria varchar NULL,
        finalizo bool NULL DEFAULT false,
        CONSTRAINT participantes_pk PRIMARY KEY (id)
    );
    */

    // Devuelve todos los participantes
    public function todos() {
        $sql = 'SELECT * FROM participantes';
        return Conexion::query($sql);
    }

    // Devuelve participantes de una carrera por posicion general
    public function todosEnCarrera($idCarrera) {
        $sql = 'SELECT participantes.*, atletas.nombre '
             . 'FROM participantes '
             . 'JOIN atletas ON participantes.id_atleta = atletas.id '
             . 'WHERE participantes.id_carrera = ' . $idCarrera . ' '
             . 'ORDER BY participantes.pos_general';

        return Conexion::query($sql);
    }

    // Devuelve un participante
    public function uno($id) {
        $sql = "SELECT * FROM participantes WHERE id = $id";
        return Conexion::query($sql);
    }
}
