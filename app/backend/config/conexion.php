<?php
class Conexion {
    private static $db = null;

    // Lee credenciales de base de datos desde base.json
    private static function getDatosDb() {
        $nombreArchivo = 'C:\xampp\htdocs\POOcarreras3\app\backend\config\base.json';

        if (is_readable($nombreArchivo)) {
            $datos = file_get_contents($nombreArchivo);
            return json_decode($datos);
        }

        return null;
    }

    // Constructor privado que intenta establecer la conexion
    private function __construct() {
        try {
            $datosDb = self::getDatosDb();

            if ($datosDb === null) {
                throw new Exception('No se pudo leer base.json o el archivo no es valido.');
            }

            $dsn = "pgsql:host=$datosDb->host;port=$datosDb->port;dbname=$datosDb->database;user=$datosDb->user;password=$datosDb->password";

            self::$db = new PDO($dsn);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Asegura que la conexión use UTF-8 para que los acentos se vean correctamente
            self::$db->exec("SET client_encoding TO 'UTF8'");
        } catch (Exception $e) {
            // Conexion no asignada: getConexion detectara que fallo
            echo 'Error de conexion: ' . $e->getMessage();
        } catch (PDOException $e) {
            echo 'Error PDO: ' . $e->getMessage();
        }
    }

    // Devuelve la instancia de conexion o lanza excepcion si falla
    public static function getConexion() {
        if (self::$db !== null) {
            return self::$db;
        }

        new self();

        if (self::$db === null) {
            throw new Exception('No se pudo establecer la conexion con la base de datos.');
        }

        return self::$db;
    }

    // Ejecuta una consulta SELECT y devuelve un array de objetos
    public static function query($sql) {
        try {
            $pDO = self::getConexion();
            $statement = $pDO->query($sql, PDO::FETCH_OBJ);
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo 'Error en la consulta: ' . $e->getMessage();
            return [];
        }
    }

    // Ejecuta INSERT, UPDATE o DELETE
    public static function ejecutar($sql) {
        try {
            $pDO = self::getConexion();
            $pDO->exec($sql);
        } catch (PDOException $e) {
            echo 'Error al ejecutar la sentencia: ' . $e->getMessage();
        }
    }

    // Prepara una sentencia SQL parametrizada
    public static function prepare($sql) {
        try {
            $pDO = self::getConexion();
            return $pDO->prepare($sql);
        } catch (PDOException $e) {
            echo 'Error al preparar la sentencia: ' . $e->getMessage();
            return null;
        }
    }

    // Ultimo ID insertado
    public static function getLastId() {
        try {
            $pDO = self::getConexion();
            return $pDO->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error al obtener el ultimo ID: ' . $e->getMessage();
            return null;
        }
    }

    // Cierra la conexion
    public static function closeConexion() {
        self::$db = null;
    }
}

/* Ejemplo rapido
try {
    $datos = Conexion::query('SELECT NOW()');
    print_r($datos);
} catch (Exception $e) {
    echo 'Error capturado: ' . $e->getMessage();
}
*/
