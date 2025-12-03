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

    // Mostrar formulario para cargar / editar resultados de manera manual (vista admin)
    public function cargarResultadosManual($idCarrera) {
        $resultados = $this->model->traerPorCarrera($idCarrera);

        $this->smarty->assign('titulo', 'Cargar resultados');
        $this->smarty->assign('resultados', $resultados);
        $this->smarty->assign('idCarrera', $idCarrera);
        $this->smarty->display('backend/views/admin/cargar_resultados_manual.tpl');
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

    //Se habilita un formulario para una carrera para elegir un archivo .csv
    public function cargarResultadosForm($idCarrera) {
        $this->smarty->assign('carrera_id', $idCarrera);
        $this->smarty->display('backend/views/admin/cargar_resultados_csv.tpl');
    }

    //Verifica que el archivo .csv esté cargado correctamente
    public function importarResultados($carrera_id) {
    
        if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== 0) {
            die("Error al subir archivo");
         }

        $file = $_FILES['archivo']['tmp_name'];
        $handle = fopen($file, "r");

        if (!$handle) {
            die("No se pudo leer el archivo");
        }

        $resultadosCargados = 0;
        $errores = [];

        while (($line = fgets($handle)) !== false) {
            $line = trim($line);
            if ($line === '') continue;

            // dorsal;tiempo;pos_general
            list($dorsal, $tiempo, $posGeneral) = explode(";", $line);

            // buscar inscripción
            $ins = $this->model->buscarInscripcionPorDorsal($carrera_id, $dorsal);

            if (!$ins) {
                $errores[] = "Dorsal $dorsal no encontrado.";
                continue;
            }

            // guardar resultado
            $this->model->guardarResultado($ins['id'], $tiempo, $posGeneral);

            $resultadosCargados++;
        }

        fclose($handle);

        // Mostrar resumen
        $this->smarty->assign('cargados', $resultadosCargados);
        $this->smarty->assign('errores', $errores);
        $this->smarty->display('backend/views/admin/resumen_importacion.tpl');
    }

}

