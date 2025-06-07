<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $fecha_nacimiento = $_POST['dob'];
    $sexo = $_POST['gender'];
    $dni = $_POST['dni'];
    $email = $_POST['mail'];

    // Crear un array con los datos
    $datos = array(
        "nombre" => $nombre,
        "fecha_nacimiento" => $fecha_nacimiento,
        "sexo" => $sexo,
        "dni" => $dni,
        "email" => $email
    );

    // Convertir el array a formato JSON
    $json_datos = json_encode($datos, JSON_PRETTY_PRINT);

    // Crear o abrir el archivo JSON y guardar los datos
    file_put_contents("datos.json", $json_datos, FILE_APPEND | LOCK_EX);

    echo "Datos guardados correctamente en formato JSON.";
}
?>
