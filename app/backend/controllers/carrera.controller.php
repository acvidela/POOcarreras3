<?php
require_once 'backend/models/carrera.model.php';
require_once 'backend/models/resultado.model.php';
require_once 'backend/controllers/base.controller.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class CarreraController extends BaseController{
    private $model;
    
    public function __construct() {
        parent::__construct();
        $this->model = new Carrera();
    }

    // ======== FRONT ========
    public function mostrarAnteriores() {
        $carreras = $this->model->listarAnteriores();
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('frontend/templates/verresultadoscarreras.tpl');
    }

    // ======== ADMIN LISTADOS ========
    public function carrerasFuturas() {
        $carreras = $this->model->listarFuturas();
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('backend/views/admin/carreras_futuras.tpl');
    }

    public function carrerasTerminadas() {
        $carreras = $this->model->anteriores();
        $this->smarty->assign('titulo', 'Es-Tan-Dil - Carreras anteriores');
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('backend/views/admin/carreras_terminadas.tpl');
    }

    // ======== FRONT DETALLE ========
    public function mostrarResultadoCarrera($id) {
        if (!$id) {
            echo 'Carrera no especificada.';
            return;
        }

        $resultadoModel = new ResultadoModel();
        $carrera = $this->model->una($id);
        $resultados = $resultadoModel->traerPorCarrera($id);

        $this->smarty->assign('titulo', 'Es-Tan-Dil - Resultado carrera');
        // La vista espera iterar, por eso enviamos un array
        $this->smarty->assign('carrera', $carrera ? [$carrera] : []);
        $this->smarty->assign('resultados', $resultados);
        $this->smarty->display('frontend/templates/resultadoCarrera.tpl');
    }

    public function mostrarProximasCarreras() {
        $carreras = $this->model->proximas();
        $this->smarty->assign('titulo', 'Es-Tan-Dil - Proximas Carreras');
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->display('frontend/templates/verproximascarreras.tpl');
    }

    // ======== ADMIN FORMULARIOS ========
    public function mostrarFormularioCrear() {
        $this->smarty->assign('titulo', 'Crear nueva carrera');
        $this->smarty->assign('carrera', null);
        $this->smarty->display('backend/views/admin/carrera_crear.tpl');
    }

    public function mostrarFormularioEditar($id) {
        $carrera = $this->model->una($id);
        if (!$carrera) {
            echo "Carrera no encontrada.";
            return;
        }

        $this->smarty->assign('titulo', 'Editar carrera');
        $this->smarty->assign('carrera', $carrera);
        $this->smarty->display('backend/views/admin/carrera_crear.tpl');
    }

    // ======== ADMIN PERSISTENCIA ========
    public function guardarCarrera() {
        if (
            empty($_POST['nombre']) ||
            empty($_POST['fecha']) ||
            empty($_POST['circuito']) ||
            empty($_POST['precio'])
        ) {
            die("Faltan datos obligatorios");
        }

        $payload = [
            'nombre' => $_POST['nombre'],
            'fecha' => $_POST['fecha'],
            'circuito' => $_POST['circuito'],
            'precio' => $_POST['precio']
        ];

        if (!empty($_POST['id'])) {
            $this->model->actualizar($_POST['id'], $payload);
        } else {
            $this->model->insertar($payload);
        }

        header("Location: index.php?action=carrerasFuturas");
        exit;
    }

    public function eliminarCarrera($id) {
        if (!$id) {
            echo "Carrera no especificada.";
            return;
        }

        $this->model->eliminar($id);
        header("Location: index.php?action=carrerasFuturas");
        exit;
    }
}
