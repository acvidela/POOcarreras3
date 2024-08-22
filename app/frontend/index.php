<?php

require_once('lib\smarty\libs\Smarty.class.php');

$smarty = new Smarty\Smarty;                                    //
$smarty->display('templates\index.tpl');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Aquí puedes validar las credenciales o realizar otras acciones
    if ($username && $password) {
        echo "Bienvenido, $username!";
    } else {
        echo "Inicio de sesión cancelado.";
    }
}

?>

