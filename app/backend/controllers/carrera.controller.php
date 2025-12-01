<?php
require_once 'backend/models/carrera.model.php';
require_once 'backend/models/participante.model.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class CarreraController {


    private $model;
    private $smarty;

    public function __construct() {
        $this->model = new Carrera();
        $this->smarty = new Smarty\Smarty();
    }


    //Admin
    public function mostrarAnteriores() {
        $carreras = $this->model->listarAnteriores();
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('backend/views/admin/carreras_terminadas.tpl');
    }

     //Admin
    public function carrerasFuturas() {
        $carreras = $this->model->listarFuturas();
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('backend/views/admin/carreras_futuras.tpl');
    }
    

    //Admin: Muestra las carreras terminadas y está la opción de cargar/editar/ver resultados
    public function carrerasTerminadas() {
        $modelo = new Carrera();
        $carreras = $modelo->anteriores();

        $this->smarty->assign('titulo', 'Es-Tan-Dil - Carreras anteriores');
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('backend/views/admin/carreras_terminadas.tpl');
    }


    // Muestra los resultados de una carrera especifica
    public function mostrarResultadoCarrera($id) {
        if (!$id) {
            echo 'Carrera no especificada.';
            return;
        }

        $carreraModel = new Carrera();
        $participanteModel = new Participante();

        $carrera = $carreraModel->una($id);
        $resultados = $participanteModel->todosEnCarrera($id);

        $smarty = new Smarty\Smarty();
        $smarty->assign('titulo', 'Es-Tan-Dil - Resultado carrera');
        $smarty->assign('carrera', $carrera);
        $smarty->assign('resultados', $resultados);
        $smarty->display('frontend/templates/resultadoCarrera.tpl');
    }

    // Muestra las carreras próximas con formulario de inscripción
    public function mostrarProximasCarreras() {
        $modelo = new Carrera();
        $carreras = $modelo->proximas();

        $smarty = new Smarty\Smarty();
        $smarty->assign('titulo', 'Es-Tan-Dil - Proximas Carreras');
        $smarty->assign('carreras', $carreras);
        $smarty->display('frontend/templates/verproximascarreras.tpl');
    }

    // Admin: Mostrar formulario
    public function mostrarFormularioCrear() {
        $this->smarty->assign('titulo', 'Crear nueva carrera');
        $this->smarty->display('backend/views/admin/carrera_crear.tpl');
    }


    // Admin: Guardar datos del formulario
    public function guardarCarrera() {

        // Validaciones básicas
         if (
            empty($_POST['nombre']) ||
            empty($_POST['fecha']) ||
            empty($_POST['circuito']) ||
            empty($_POST['precio'])
        ) {
            die("Faltan datos obligatorios");
        }

        $this->model->insertar([
            'nombre'   => $_POST['nombre'],
            'fecha'    => $_POST['fecha'],
            'circuito' => $_POST['circuito'],
            'precio'   => $_POST['precio']
        ]);

        // Redirección al listado
        header("Location: index.php?action=carrerasFuturas");
        exit;
    }
}
