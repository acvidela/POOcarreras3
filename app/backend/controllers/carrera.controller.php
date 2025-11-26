<?php
require_once 'backend/models/carrera.model.php';
require_once 'backend/models/participante.model.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';

class CarreraController {
    // Muestra las carreras anteriores con resultados
    public function mostrarAnteriores() {
        $modelo = new Carrera();
        $carreras = $modelo->anteriores();

        $smarty = new Smarty\Smarty();
        $smarty->assign('titulo', 'Es-Tan-Dil - Carreras anteriores');
        $smarty->assign('carreras', $carreras);
        $smarty->display('frontend/templates/verresultadoscarreras.tpl');
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

    // Muestra las carreras proximas con formulario de inscripcion
    public function mostrarProximasCarreras() {
        $modelo = new Carrera();
        $carreras = $modelo->proximas();

        $smarty = new Smarty\Smarty();
        $smarty->assign('titulo', 'Es-Tan-Dil - Proximas Carreras');
        $smarty->assign('carreras', $carreras);
        $smarty->display('frontend/templates/verproximascarreras.tpl');
    }

    // Crear carrera desde el panel admin
    public function crearCarrera($post) {
        session_start();

        $nombre = trim($post['nombre'] ?? '');
        $circuito = trim($post['circuito'] ?? '');
        $fecha = $post['fecha'] ?? '';
        $precio = $post['precio'] ?? '';

        if ($nombre === '' || $circuito === '' || $fecha === '' || $precio === '') {
            $_SESSION['flash_admin'] = 'Todos los campos son obligatorios.';
            header('Location: admin');
            exit;
        }

        if (!is_numeric($precio)) {
            $_SESSION['flash_admin'] = 'El precio debe ser un número.';
            header('Location: admin');
            exit;
        }

        $modelo = new Carrera();
        $modelo->insertar([
            'nombre' => $nombre,
            'circuito' => $circuito,
            'fecha' => $fecha,
            'precio' => $precio,
        ]);

        $_SESSION['flash_admin'] = 'Carrera creada correctamente.';
        header('Location: admin');
        exit;
    }
}
