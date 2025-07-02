<?php
class Conexion {

    private static $db = null;

    // Obtiene los datos de acceso a la DB desde un archivo JSON local
    private static function getDatosDb() {
        $nombreArchivo = 'C:\xampp\htdocs\POOcarreras3\app\backend\config\base.json';

        if (is_readable($nombreArchivo)) {
            $datos = file_get_contents($nombreArchivo);
            $datos = json_decode($datos);
            return $datos;
        }

        return null;
    }

    // Constructor privado que intenta establecer la conexión
    private function __construct() {
        try {
            $datosDb = self::getDatosDb();

            if ($datosDb == null) {
                throw new Exception('No se pudo leer el archivo base.json o el archivo no es válido.');
            }

            $dsn = "pgsql:host=$datosDb->host;port=$datosDb->port;dbname=$datosDb->database;user=$datosDb->user;password=$datosDb->password";

            self::$db = new PDO($dsn);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            // No asigna conexión → getConexion detectará que falló
            echo '⚠️ Error de conexión: ' . $e->getMessage();
        } catch (PDOException $e) {
            echo '⚠️ Error PDO: ' . $e->getMessage();
        }
    }

    // Devuelve la instancia de conexión o lanza excepción si no puede conectarse
    static function getConexion() {
        if (self::$db !== null) {
            return self::$db;
        }

        new self(); // Intenta crear la conexión

        if (self::$db === null) {
            throw new Exception('No se pudo establecer la conexión con la base de datos.');
        }

        return self::$db;
    }

    // Ejecuta una consulta SELECT y devuelve un array de objetos
    static function query($sql) {
        try {
            $pDO = self::getConexion();
            $statement = $pDO->query($sql, PDO::FETCH_OBJ);
            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo '⚠️ Error en la consulta: ' . $e->getMessage();
            return [];
        }
    }

    // Ejecuta una sentencia SQL (INSERT, UPDATE, DELETE) sin retornar resultados
    static function ejecutar($sql) {
        try {
            $pDO = self::getConexion();
            $pDO->exec($sql);
        } catch (PDOException $e) {
            echo '⚠️ Error al ejecutar la sentencia: ' . $e->getMessage();
        }
    }

    // Prepara una sentencia SQL parametrizada
    static function prepare($sql) {
        try {
            $pDO = self::getConexion();
            return $pDO->prepare($sql);
        } catch (PDOException $e) {
            echo '⚠️ Error al preparar la sentencia: ' . $e->getMessage();
            return null;
        }
    }

    // Retorna el último ID insertado (para tablas con SERIAL o IDENTITY)
    static function getLastId() {
        try {
            $pDO = self::getConexion();
            return $pDO->lastInsertId();
        } catch (PDOException $e) {
            echo '⚠️ Error al obtener el último ID: ' . $e->getMessage();
            return null;
        }
    }

    // Cierra la conexión (opcional en la mayoría de los casos)
    static function closeConexion() {
        self::$db = null;
    }
}

/*
//Para probar la conexión a la Base de datos
try {
    $datos = Conexion::query("SELECT NOW()");
    print_r($datos);
} catch (Exception $e) {
    echo 'Error capturado: ' . $e->getMessage();
}
*/