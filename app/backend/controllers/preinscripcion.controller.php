<?php

require_once 'backend/models/preinscripcion.model.php';
require_once 'backend/models/atleta.model.php';
require_once 'backend/models/carrera.model.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class PreinscripcionController {

    private $model;

    public function __construct() {
        $this->model = new PreinscripcionModel();
    }

    // FORMULARIO DE PREINSCRIPCIÓN (público)
    public function mostrarFormulario($carrera_id) {
        if (!$carrera_id) {
            echo "Carrera no especificada.";
            return;
        }

        $carreraModel = new Carrera();
        $carrera = $carreraModel->una($carrera_id);

        $smarty = new Smarty\Smarty;
        $smarty->assign('carrera', $carrera);
        $smarty->assign('titulo', 'Preinscripción');
        $smarty->display('frontend/templates/preinscripcion.tpl');
    }

    // GUARDAR PREINSCRIPCIÓN (público)
    public function guardarPreinscripcion($post) {

        if (!$post) {
            echo "Datos inválidos";
            return;
        }

        // 1) Guardar atleta (siempre nuevo)
        require_once 'backend/models/atleta.model.php';
        $atletaModel = new Atleta();
        
        $atleta_id = $atletaModel->insertarYDevolverID([
            'nombre' => $post['nombre'],
            'apellido' => $post['apellido'],
            'dni' => $post['dni'],
            'email' => $post['email'],
            'telefono' => $post['telefono'],
            'genero' => $post['genero'],
            'fechadenacimiento' => $post['fechadenacimiento'],
        ]);

        // 2) Crear la preinscripción
        $this->model->insertar([
            'atleta_id' => $atleta_id,
            'carrera_id' => $post['carrera_id'],
            'estado' => 'pendiente',
            'comprobante_pago' => null
        ]);

        header("Location: index.php?action=home&msg=preinscrito");
        exit;
    }

    // LISTADO (admin)
    public function listarPreinscripciones() {
        $preinscripciones = $this->model->todos();

        $smarty = new Smarty\Smarty;
        $smarty->assign('titulo', 'Preinscripciones');
        $smarty->assign('preinscripciones', $preinscripciones);
        $smarty->display('backend/templates/listarPreinscripciones.tpl');
    }

    // ACTUALIZAR ESTADO (admin)
    public function actualizarEstado($id, $estado) {
        $this->model->actualizarEstado($id, $estado);

        header("Location: index.php?action=gestionarPreinscripciones");
        exit;
    }

    // ELIMINAR (admin)
    public function eliminar($id) {
        $this->model->eliminar($id);

        header("Location: index.php?action=gestionarPreinscripciones");
        exit;
    }
}
