<?php

require_once 'administrador.controller.php';
require_once 'backend/controllers/carrera.controller.php';
// Agregar resto de controladores aqui si se suman nuevos

class Router {
    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';

        switch ($action) {
            case 'home': // Pagina principal
                $controller = new AdministradorController();
                $controller->mostrarInicio();
                break;

            case 'verproximascarreras': // Carreras futuras
                $controller = new CarreraController();
                $controller->mostrarProximasCarreras();
                break;

            case 'verresultadoscarreras': // Carreras terminadas
                $controller = new CarreraController();
                $controller->mostrarAnteriores();
                break;

            case 'resultadoCarrera': // Resultados individuales
                $controller = new CarreraController();
                $controller->mostrarResultadoCarrera($_GET['id'] ?? null);
                break;

            case 'login': // Login admin
                $controller = new AdministradorController();
                $controller->mostrarLogin();
                break;

            case 'logout':
                $controller = new AdministradorController();
                $controller->logout();
                break;

            case 'validarlogin':
                $controller = new AdministradorController();
                $controller->validarLogin($_POST);
                break;

            case 'admin': // Panel admin
                $controller = new AdministradorController();
                $controller->mostrarPanelAdmin();
                break;

            case 'crearCarrera':
                $controller = new CarreraController();
                $controller->crearCarrera($_POST);
                break;

            default:
                echo '404 - Pagina no encontrada.';
                break;
        }
    }
}
