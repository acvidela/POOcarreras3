<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\models\administrador.model.php';
require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\models\carrera.model.php';
require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\models\inscripcion.model.php';
require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\models\resultado.model.php';
require_once 'C:\xampp\htdocs\POOcarreras3\app\frontend\lib\smarty\libs\Smarty.class.php';
require_once 'backend/controllers/base.controller.php';

class AdministradorController extends BaseController{
    private $modelo;

    public function __construct() {
        parent::__construct();
        $this->modelo = new AdministradorModel();
        $this->smarty->setTemplateDir('app/backend/views/admin/');
    }

    public function mostrarInicio() {
        session_start();
        $logueado = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
        $this->smarty->assign('logueado', $logueado);
        //$this->smarty->assign('usuario', $_SESSION['usuario'] ?? '');
        $this->smarty->display('frontend/templates/index.tpl');
    }

    public function verProximasCarreras() {
        $this->smarty->assign('titulo', 'Proximas Carreras');
        $this->smarty->display('frontend/templates/verproximascarreras.tpl');
    }

    public function verResultadosCarreras() {
        $this->smarty->assign('titulo', 'Resultados');
        $this->smarty->display('frontend/templates/verresultadoscarreras.tpl');
    }

    public function mostrarLogin($mensaje = null) {
        session_start();
        $mensaje = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);

        $this->smarty->assign('titulo', 'Login de Administrador');
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('frontend/templates/administrador.tpl');
    }

    public function validarLogin($post) {
        $usuario = $post['usuario'] ?? '';
        $clave = $post['clave'] ?? '';

        $admin = AdministradorModel::verificarCredenciales($usuario, $clave);

        if ($admin && password_verify($clave, $admin['clave'])) {
            session_start();
            $_SESSION['admin'] = true;
            $_SESSION['usuario'] = $usuario;
            header('Location: admin');
            exit;
        }

        session_start();
        $_SESSION['error'] = 'Usuario o contrasena incorrectos. Intente nuevamente.';
        header('Location: login');
        exit;
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: home');
        exit;
    }

    public function mostrarPanelAdmin() {
        session_start();
        if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header('Location: login');
            exit;
        }

        $flash = $_SESSION['flash_admin'] ?? '';
        unset($_SESSION['flash_admin']);

        // Resumen rápido para el tablero
        $carreraModel = new Carrera();
        $resultadoModel = new resultadoModel(); 

        $todasCarreras = $carreraModel->todas();
        $proximasCarreras = $carreraModel->proximas();
        $anterioresCarreras = $carreraModel->anteriores();
        $participantes = $resultadoModel->todos();   //Todos los que ya han corrido

        $stats = [
            'total_carreras' => count($todasCarreras),
            'proximas' => count($proximasCarreras),
            'anteriores' => count($anterioresCarreras),
            'participantes' => count($participantes),
        ];

        // Listado de recientes (últimas 5 por fecha descendente)
        $carrerasRecientes = array_slice($anterioresCarreras, 0, 5);

        // Alertas básicas
        $alertas = [];
        if ($stats['proximas'] === 0) {
            $alertas[] = 'No hay carreras próximas cargadas. Crea una nueva para que aparezca en la web.';
        }
        if ($stats['anteriores'] === 0) {
            $alertas[] = 'No hay carreras anteriores con resultados publicados.';
        }
        if ($stats['participantes'] === 0) {
            $alertas[] = 'Aún no hay inscriptos cargados.';
        }

        $this->smarty->assign('usuario', $_SESSION['usuario'] ?? '');
        $this->smarty->assign('stats', $stats);
        $this->smarty->assign('carrerasRecientes', $carrerasRecientes);
        $this->smarty->assign('alertas', $alertas);
        $this->smarty->assign('flash', $flash);
        $this->smarty->display('backend/views/admin/paneladmin.tpl');
    }

    public function aprobarInscripcion() {
        $inscripcion_id = $_POST['id'];
        $carrera_id = $_POST['carrera_id'];
        $genero = $_POST['genero'];

        // 1. Obtener categoría según género
        //$categoria = ($genero === 'F') ? 'Femenino' : 'Masculino'; No se realiza más en inscripción, se realiza en resultados

        // 2. Obtener siguiente número de dorsal
    
        $insModel = new InscripcionesModel();
        $dorsal = $insModel->obtenerSiguientedorsal($carrera_id);

        // 3. Actualizar inscripción
        $insModel->aprobarInscripcion($inscripcion_id, $dorsal);

        // 4. (Opcional) Enviar mail
        // $this->enviarMailConfirmacion(...);

        header("Location: index.php?view=preinscripciones_pagadas&msg=ok");
    }

}
