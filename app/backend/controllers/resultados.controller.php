<?php
require_once 'backend/models/carrera.model.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class ResultadosController {

    public function mostrarAnteriores() {
        $modelo = new Carrera();
        $carreras = $modelo->anteriores();

        $smarty = new Smarty\Smarty;
        $smarty->assign('titulo', 'Es-Tan-Dil - Carreras anteriores');
        $smarty->assign('carreras', $carreras);
        $smarty->display('frontend/templates/verresultadoscarreras.tpl');
    }
}