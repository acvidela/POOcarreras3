<?php
require_once 'backend/models/carrera.model.php';
require_once 'backend/models/participante.model.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class CarreraController {

    // Muestra las carreras anteriores con resultados
    public function mostrarAnteriores() {
        $modelo = new Carrera();
        $carreras = $modelo->anteriores();

        $smarty = new Smarty\Smarty;
        $smarty->assign('titulo', 'Es-Tan-Dil - Carreras anteriores');
        $smarty->assign('carreras', $carreras);
        $smarty->display('frontend/templates/verresultadoscarreras.tpl');
    }

    // Muestra los resultados de una carrera específica
    public function mostrarResultadoCarrera($id) {
        if (!$id) {
            echo "Carrera no especificada.";
            return;
        }

        $carreraModel = new Carrera();
        $participanteModel = new Participante();

        $carrera = $carreraModel->una($id);
        $resultados = $participanteModel->todosEnCarrera($id);

        $smarty = new Smarty\Smarty;
        $smarty->assign('titulo', 'Es-Tan-Dil - Resultado carrera');
        $smarty->assign('carrera', $carrera);
        $smarty->assign('resultados', $resultados);
        $smarty->display('frontend/templates/resultadoCarrera.tpl');
    }

    // Muestra las carreras próximas con formulario de inscripción
    public function mostrarProximasCarreras() {
        $modelo = new Carrera();
        $carreras = $modelo->proximas();

        $smarty = new Smarty\Smarty;
        $smarty->assign('titulo', 'Es-Tan-Dil - Próximas Carreras');
        $smarty->assign('carreras', $carreras);
        $smarty->display('frontend/templates/verproximascarreras.tpl');
    }
}