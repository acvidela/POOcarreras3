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

    public function buscarPorDni($dni) {
      $sql = "SELECT * FROM atletas WHERE dni = :dni LIMIT 1";
        $stmt = Conexion::prepare($sql);
        $stmt->execute([':dni' => $dni]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // devuelve un solo atleta o false
    }
    
    public function insertarYDevolverID($data) {

        $atletaExistente = $this->buscarPorDni($data['dni']); 
        if ($atletaExistente) {
            $atleta_id = $atletaExistente['id'];
            return $atleta_id;
        } else {
            $sql = "
                INSERT INTO atletas (nombre, apellido, fechadenacimiento, email, dni, telefono, genero)
                VALUES (:nombre, :apellido, :fechadenacimiento, :email, :dni, :telefono, :genero)
                RETURNING id
            ";

            $stmt = Conexion::prepare($sql);
            $params = [
                ':nombre' => $data['nombre'],
                ':apellido' => $data['apellido'],
                ':fechadenacimiento' => $data['fechadenacimiento'],
                ':email' => $data['email'],
                ':dni' => $data['dni'],
                ':telefono' => $data['telefono'],
                ':genero' => $data['genero']
            ];

            try {
                $stmt->execute($params);
            } catch (PDOException $e) {
                if (strpos($e->getMessage(), 'atletas_pkey') !== false) {
                    $this->sincronizarSecuencia();
                    $stmt->execute($params);
                } else {
                    throw $e;
                }
            }

            return $stmt->fetchColumn(); // devuelve el id para poder insertarlo como FK en preinscripcion

        }
    }

    private function sincronizarSecuencia() {
        $sql = "
            SELECT setval(
                pg_get_serial_sequence('atletas', 'id'),
                COALESCE((SELECT MAX(id) FROM atletas), 0) + 1,
                false
            );
        ";
        Conexion::query($sql);
    }
    // Actualizar atleta
    public function actualizar($id, $data) {

        $sql = "
            UPDATE atletas SET
                nombre = :nombre,
                apellido = :apellido,
                fechadenacimiento = :fechadenacimiento,
                email = :email,
                dni = :dni,
                telefono = :telefono,
                genero = :genero
            WHERE id = :id
        ";

        $stmt = Conexion::prepare($sql);
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':apellido' => $data['apellido'],
            ':fechadenacimiento' => $data['fechadenacimiento'],
            ':email' => $data['email'],
            ':dni' => $data['dni'],
            ':telefono' => $data['telefono'],
            ':genero' => $data['genero'],
            ':id' => $id,
        ]);
    }

    // Eliminar atleta
    public function eliminar($id) {
        $sql = "DELETE FROM atletas WHERE id = $id";
        return Conexion::query($sql);
    }
}

