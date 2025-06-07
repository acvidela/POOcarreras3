<?php

require_once('lib\smarty\libs\Smarty.class.php');
require_once('../backend/controllers/router.php');
require_once('../backend/models/administrador.model.php');

$smarty = new Smarty\Smarty;        
$smarty->assign('titulo', 'Es-Tan-Dil');                            //
$smarty->display('templates\index.tpl');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $adminValido =  verificarCredenciales($username, $password);
    // Aquí puedes validar las credenciales o realizar otras acciones
    if ($adminValido) {
        echo "Bienvenido, $username!";
    } else {
        echo "Inicio de sesión cancelado.";
    }
}

?>

