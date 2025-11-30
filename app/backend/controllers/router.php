<?php

require_once 'administrador.controller.php';
require_once 'backend/controllers/carrera.controller.php';
require_once 'backend/controllers/preinscripcion.controller.php';

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

            case 'preinscribirse':
                // Muestra formulario para preinscribirse en una carrera
                $controller = new PreinscripcionController();
                $controller->mostrarFormulario($_GET['carrera_id'] ?? null);
            break;
            //Trabajo con preinscripciones
            case 'guardarPreinscripcion':
                // Procesa POST del formulario de preinscripción
                $controller = new PreinscripcionController();
                $controller->guardarPreinscripcion($_POST);
                break;

            case 'gestionarPreinscripciones':
                // Vista del administrador
                $controller = new PreinscripcionController();
                $controller->listarPreinscripciones();
                break;

            case 'actualizarEstadoPreinscripcion':
                $controller = new PreinscripcionController();
                $controller->actualizarEstado($_POST['id'], $_POST['estado']);
                break;

            case 'eliminarPreinscripcion':
                $controller = new PreinscripcionController();
                $controller->eliminar($_GET['id']);
                break;

            case 'preinscripcionConfirmada':
                $controller = new PreinscripcionController();
                $controller->mostrarConfirmacion($_GET['id'] ?? null);
                break;
            
            case 'cuponPago':
                $controller = new PreinscripcionController();
                $controller->mostrarCuponPago($_GET['id'] ?? null);
                break;
            
            default:
                echo '404 - Pagina no encontrada.';
                break;
            }
    }
}
