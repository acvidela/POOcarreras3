<?php

require_once 'administrador.controller.php'; 
require_once 'backend/controllers/carrera.controller.php';
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

            // Carreras futuras
            case 'verproximascarreras':
                $controller = new CarreraController();
                $controller->mostrarProximasCarreras();
            break;

            //Muestra todas las carreras terminadas
            case 'verresultadoscarreras':
                $controller = new CarreraController();
                $controller->mostrarAnteriores();
                break;
            
            //Muestra los resultados de una carrera en particular
            case 'resultadoCarrera':
                $controller = new CarreraController();
                $controller->mostrarResultadoCarrera($_GET['id'] ?? null);
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

