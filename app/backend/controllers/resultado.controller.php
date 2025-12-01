<?php
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class ResultadoController {

    private $model;
    private $smarty;

    public function __construct() {
        $this->model = new ResultadoModel();
        $this->smarty = new Smarty\Smarty();
    }

    
    
    
    
    // Mostrar resultados de una carrera (vista admin)
    public function verResultadosAdmin($idCarrera) {
        $resultados = $this->model->traerPorCarrera($idCarrera);

        $this->smarty->assign('titulo', 'Resultados de la carrera');
        $this->smarty->assign('resultados', $resultados);
        $this->smarty->display('backend/views/admin/resultados.tpl');
    }

    // Mostrar formulario para cargar / editar resultados (vista admin)
    public function cargarResultados($idCarrera) {
        $resultados = $this->model->traerPorCarrera($idCarrera);

        $this->smarty->assign('titulo', 'Cargar resultados');
        $this->smarty->assign('resultados', $resultados);
        $this->smarty->assign('idCarrera', $idCarrera);
        $this->smarty->display('backend/views/admin/cargar_resultados.tpl');
    }

    // Guardar resultados enviados desde el formulario
    public function guardarResultados() {
        $idCarrera = $_POST['id_carrera'];

        // Ejemplo: array de posiciones/dorsales enviado desde la vista
        foreach ($_POST['resultados'] as $idInscripcion => $datos) {
            $this->model->actualizarResultado(
                $idInscripcion,
                $datos['pos_final'],
                $datos['tiempo']
            );
        }

        header("Location: index.php?action=verResultadosAdmin&id={$idCarrera}");
    }
}

