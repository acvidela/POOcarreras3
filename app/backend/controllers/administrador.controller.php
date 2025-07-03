<?php

require_once 'C:\xampp\htdocs\POOcarreras3\app\backend\models\administrador.model.php';
require_once 'C:\xampp\htdocs\POOcarreras3\app\frontend\lib\smarty\libs\Smarty.class.php';

class AdministradorController {

    private $smarty;
    private $modelo;

    public function __construct() {
        $this->smarty = new Smarty\Smarty;
        $this->modelo = new AdministradorModel();
    }

    public function mostrarInicio() {
        session_start();
        $logueado = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
        $this->smarty->assign('logueado', $logueado);
        $this->smarty->assign('usuario', $_SESSION['usuario'] ?? '');
        $this->smarty->display('frontend/templates/index.tpl');
    }

    public function verProximasCarreras() {
        $this->smarty->assign('titulo', 'Próximas Carreras');
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
        $this->smarty->assign('mensaje', $mensaje); // para mostrar errores
        $this->smarty->display('frontend/templates/administrador.tpl'); //Para loguearse
    }

    public function validarLogin($post) {
        $usuario = $post['usuario'] ?? '';
        $clave = $post['clave'] ?? '';

        $admin = AdministradorModel::verificarCredenciales($usuario, $clave);

        if ($admin && password_verify($clave, $admin['clave'])) {
            session_start();
            $_SESSION['admin'] = true;
            $_SESSION['usuario'] = $usuario;
            header('Location: admin'); // redirige a /admin
            exit;
        } else {
            session_start();
            $_SESSION['error'] = 'Usuario o contraseña incorrectos. Por favor, intente nuevamente.';
            header('Location: login');
            exit;
        }
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
        $this->smarty->assign('usuario', $_SESSION['usuario'] ?? ''); // opcional
        $this->smarty->display('frontend/templates/paneladmin.tpl');
    }
 
}
