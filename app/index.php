<?php
// Fuerza UTF-8 en la salida para evitar caracteres raros
header('Content-Type: text/html; charset=UTF-8');

// Cargar Smarty
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

// Cargar el router principal
require_once 'backend/controllers/router.php';

// Ejecutar enrutamiento
$router = new Router();
$router->handleRequest();
