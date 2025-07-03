<?php
// Cargar Smarty
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

// Cargar el router principal
require_once 'backend/controllers/router.php';

// Ejecutar enrutamiento
$router = new Router();
$router->handleRequest();
