<?php

require_once 'administrador.controller.php';
require_once 'backend/controllers/carrera.controller.php';
require_once 'backend/controllers/inscripcion.controller.php';

class Router {
    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';

        switch ($action) {
            case 'home': // Pagina principal
                $controller = new AdministradorController();
                $controller->mostrarInicio();
                break;

            case 'verproximascarreras': // Front: Carreras futuras
                $controller = new CarreraController();
                $controller->mostrarProximasCarreras();
                break;

            case 'verresultadoscarreras': // Front: Carreras terminadas
                $controller = new CarreraController();
                $controller->mostrarAnteriores();
                break;

            case 'resultadoCarrera': // Front: Resultados individuales
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

            case 'crearCarrera':  //Back: crear carrera
                $controller = new CarreraController();
                $controller->crearCarrera($_POST);
                break;

            case 'preinscribirse': 
                $controller = new InscripcionController();
                $controller->mostrarFormulario($_GET['carrera_id'] ?? null);
            break;
            //Trabajo con preinscripciones
            case 'guardarPreinscripcion':
                // Procesa POST del formulario de preinscripción
                $controller = new InscripcionController();
                $controller->guardarPreinscripcion($_POST);
                break;

            case 'gestionarPreinscripciones':
                // Vista del administrador
                $controller = new InscripcionController();
                $controller->listarPreinscripciones();
                break;

            case 'actualizarEstadoPreinscripcion':
                $controller = new InscripcionController();
                $controller->actualizarEstado($_GET['id'] ?? null, $_GET['estado'] ?? null );
                break;

            case 'eliminarPreinscripcion':
                $controller = new InscripcionController();
                $controller->eliminar($_GET['id']);
                break;

            case 'preinscripcionConfirmada':
                $controller = new InscripcionController();
                $controller->mostrarConfirmacion($_GET['id'] ?? null);
                break;
            
            case 'cuponPago':
                $controller = new InscripcionController();
                $controller->mostrarCuponPago($_GET['id'] ?? null);
                break;

            case 'inscripcionesPendientes':
                $controller = new InscripcionController();
                $controller->listarPendientes();
                break;

            case 'inscripcionesConfirmadas':
                $controller = new InscripcionController();
                $controller->listarConfirmadas();
                break;

            case 'inscripcionesPagadas':
                $controller = new InscripcionController();
                $controller->listarPagadas();
                break;
            
            case 'inscripcionesTodas':
                $controller = new InscripcionController();
                $controller->listarTodas();
                break;

            case 'confirmarInscripcion':
                $controller = new InscripcionController();
                $controller->confirmarInscripcion($_GET['id']);
            break;
            
            case 'carrerasTerminadas':   //Back: ver carreras finalizadas y cargar/editar resultados
                $controller = new CarreraController();
                $controller->carrerasTerminadas();
                break;
                        
            case 'carrerasFuturas':   //Back: ver carreras futuras y estado inscripciones
                $controller = new CarreraController();
                $controller->carrerasFuturas();
                break;

            default:
                echo '404 - Pagina no encontrada.';
                break;
            }
    }
}
