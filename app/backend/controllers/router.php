<?php
//require_once 'administrador.controller.php';
//require_once 'publico.controller.php'; // si tenés uno para mostrar carreras públicas

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'verresultadoscarreras':
        verResultados();
        break;
    case 'verproximascarreras':
        verProximas();
        break;
    case 'login':
        mostrarLogin();
        break;
    default:
        mostrarInicio(); // o mostrarHome()
        break;
}


// Llama a la función de enrutamiento
route($request);
?>
