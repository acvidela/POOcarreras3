<?php

require_once 'administrador.controller.php'; 
//agregar resto de controladores

class Router {

    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';

        switch ($action) {

            // Página principal
            case 'home':
                $controller = new AdministradorController();
                $controller->mostrarInicio();
                break;

            // Vistas públicas
            case 'verproximascarreras':
                $controller = new AdministradorController();
                $controller->verProximasCarreras();
                break;

            case 'verresultadoscarreras':
                $controller = new AdministradorController();
                $controller->verResultadosCarreras();
                break;

            // Login
            case 'login':
                $controller = new AdministradorController();
                $controller->mostrarLogin();
                break;

            // Logout
                case 'logout':
                $controller = new AdministradorController();
                $controller->logout();
                break;

            case 'validarlogin':
                $controller = new AdministradorController();
                $controller->validarLogin($_POST); // recibe usuario y contraseña                
                break;

            // Página del admin luego de loguearse
            case 'admin':
                $controller = new AdministradorController();
                $controller->mostrarPanelAdmin();
                break;

            // Si no matchea ninguna ruta
            default:
                echo "404 - Página no encontrada.";
                break;
        }
    }
}

