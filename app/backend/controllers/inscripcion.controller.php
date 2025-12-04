<?php

require_once 'backend/models/inscripcion.model.php';
require_once 'backend/models/atleta.model.php';
require_once 'backend/models/carrera.model.php';
require_once 'backend/controllers/base.controller.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevel;

class InscripcionController extends BaseController{

    private $model;
   
    public function __construct() {
        parent::__construct();
        $this->model = new InscripcionModel();
    }
    
    // FORMULARIO DE PREINSCRIPCION (publico)
    public function mostrarFormulario($carrera_id) {
        if (!$carrera_id) {
            echo "Carrera no especificada.";
            return;
        }

        $carreraModel = new Carrera();
        $carrera = $carreraModel->una($carrera_id);

        $this->smarty->assign('carrera', $carrera);
        $this->smarty->assign('titulo', 'Preinscripcion');
        $this->smarty->display('frontend/templates/preinscripcion.tpl');
    }

    public function guardarPreinscripcion($post) {

        if (!$post) {
            echo "Datos invalidos";
            return;
        }
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        try {
            // 0) Validar DNI unico por carrera
            if (!empty($post['dni']) && !empty($post['carrera_id']) && $this->model->existeDniParaCarrera($post['dni'], $post['carrera_id'])) {
                $mensaje = 'Ya existe una inscripcion en esta carrera con ese DNI.';
                if ($isAjax) {
                    header('Content-Type: application/json');
                    echo json_encode(['success' => false, 'message' => $mensaje]);
                    return;
                }
                echo $mensaje;
                return;
            }

            // 1) Guardar atleta
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

            // 1b) Evitar duplicados del mismo atleta en la misma carrera
            $yaInscripto = $this->model->existeParaAtletaYCarrera($atleta_id, $post['carrera_id']);
            if ($yaInscripto) {
                $mensaje = 'Ya existe una inscripcion para este atleta en esta carrera.';
                if ($isAjax) {
                    header('Content-Type: application/json');
                    echo json_encode(['success' => false, 'message' => $mensaje]);
                    return;
                }
                echo $mensaje;
                return;
            }

            // 2) Crear la preinscripcion y guardar ID
            $preinscripcion_id = $this->model->insertar([
                'atleta_id' => $atleta_id,
                'carrera_id' => $post['carrera_id'],
                'estado' => 'pendiente',
                'comprobante_pago' => null
            ]);

            // Si es una solicitud AJAX, devolvemos JSON para mostrar un pop-up en la misma pagina
            if ($isAjax) {
                $pre = $this->model->uno($preinscripcion_id);
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'preinscripcion_id' => $preinscripcion_id,
                    'estado' => $pre['estado'] ?? 'pendiente',
                ]);
                return;
            }

            // 3) Redirigir a confirmacion
            header("Location: index.php?action=preinscripcionConfirmada&id=" . $preinscripcion_id);
            exit;
        } catch (Exception $e) {
            if ($isAjax) {
                http_response_code(500);
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => false,
                    'message' => 'No se pudo guardar la preinscripcion: ' . $e->getMessage(),
                ]);
                return;
            }

            echo "No se pudo guardar la preinscripcion: " . $e->getMessage();
        }
    }


    // LISTADO (admin)
    public function listarPreinscripciones() {
        $preinscripciones = $this->model->todos();

        $this->smarty->assign('titulo', 'Preinscripciones');
        $this->smarty->assign('preinscripciones', $preinscripciones);
        $this->smarty->display('backend/views/admin/inscripciones_confirmadas.tpl');
    }

    // ACTUALIZAR ESTADO (admin)
    public function actualizarEstado($id, $estado) {
        $this->model->actualizarEstado($id, $estado);

        // Si cambia a pagado, volver a pendientes
        if ($estado === 'pagado') {
            header("Location: index.php?action=inscripcionesPendientes");
            exit;
        }

        // Para otros estados en el futuro
        header("Location: index.php?action=gestionarPreinscripciones");
        exit;
    }


    // ELIMINAR (admin)
    public function eliminar($id) {
        $this->model->eliminar($id);

        header("Location: index.php?action=gestionarPreinscripciones");
        exit;
    }


    public function mostrarCuponPago($id) {
        $pre = $this->model->obtenerCuponPorID($id);

        if (!$pre) {
            echo "Cupon no encontrado.";
            return;
        }

        // Datos que queremos en el QR
        $qrData  = "Atleta: {$pre['nombre']} {$pre['apellido']}\n";
        $qrData .= "Carrera: {$pre['carrera_nombre']}\n";
        $qrData .= "Estado: {$pre['estado']}\n";
        $qrData .= "ID Preinscripcion: {$pre['id']}";

        $qrBase64 = null;
        try {
            $qrCode = new QrCode(data: $qrData, size: 200, margin: 10);

            $writer = new PngWriter();
            $result = $writer->write($qrCode);

            // Convertir a base64 para poner en HTML
            $qrBase64 = base64_encode($result->getString());
        } catch (Exception $e) {
            // Si GD no esta habilitado no frenamos el flujo; solo omitimos el QR
            $qrBase64 = null;
        }

        $this->smarty->assign('cupon', $pre);
        $this->smarty->assign('qr', $qrBase64);
        $this->smarty->display('frontend/templates/cupon_pago.tpl');
    }
    
    public function mostrarConfirmacion($idPreinscripcion) {
        if (!$idPreinscripcion) {
            echo "Preinscripcion no encontrada.";
            return;
         }

        $pre = $this->model->uno($idPreinscripcion);

        if (!$pre) {
            echo "La preinscripcion no existe.";
            return;
        }

        $this->smarty->assign('pre', $pre);
        $this->smarty->display('frontend/templates/preinscripcion_confirmada.tpl');
    }

    public function confirmarInscripcion($id) {
        $ins = $this->model->uno($id);

        if (!$ins) {
            echo "Inscripcion no encontrada";
            return;
        }

        // 1. Obtener next dorsal
        $dorsal = $this->model->obtenerSiguienteDorsal($ins['carrera_id']);

        // 3. Actualizar inscripcion a inscripto
        $this->model->confirmarInscripcion($id, $dorsal);

        // 4. Guardamos mensaje flash
         $_SESSION['flash'] = "Inscripcion confirmada. Numero de dorsal: $dorsal";

         // Si cambia a inscripto, volver a pagados
        if ($ins['estado'] === 'inscripto') {
            header("Location: index.php?action=inscripcionesPagadas");
            exit;
        }

    }
    //Admin
    public function listarPendientes() {
        $inscripciones = $this->model->pendientesFuturas();
        $this->smarty->assign('inscripciones', $inscripciones);
        $this->smarty->display('backend/views/admin/inscripciones_pendientes.tpl');
    }
    //Admin
    public function listarPagadas() {
        $inscripciones = $this->model->pagadasFuturas();
        $this->smarty->assign('inscripciones', $inscripciones);
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        $this->smarty->assign('flash', $flash);
        $this->smarty->display('backend/views/admin/inscripciones_pagadas.tpl');
    }
    //Admin
    public function listarConfirmadas() {
        $inscripciones = $this->model->confirmadasFuturas();
        $this->smarty->assign('inscripciones', $inscripciones);
        $this->smarty->display('backend/views/admin/inscripciones_confirmadas.tpl');
    }
    //Admin
    public function listarTodas() {
        $inscripciones = $this->model->todos();
        $this->smarty->assign('inscripciones', $inscripciones);
        $this->smarty->display('backend/views/admin/inscripciones_todas.tpl');
    }

    //Admin: editar inscripcion/atleta
    public function editarInscripcion($id) {
        $detalle = $this->model->detalle($id);

        if (!$detalle) {
            echo "Inscripcion no encontrada.";
            return;
        }

        $this->smarty->assign('inscripcion', $detalle);
        $this->smarty->display('backend/views/admin/inscripcion_editar.tpl');
    }

    public function actualizarInscripcion($post) {
        if (empty($post['id'])) {
            echo "Solicitud invalida.";
            return;
        }

        $ins = $this->model->uno($post['id']);
        if (!$ins) {
            echo "Inscripcion no encontrada.";
            return;
        }

        // Actualizar atleta
        $atletaModel = new Atleta();
        $atletaModel->actualizar($ins['atleta_id'], [
            'nombre' => $post['nombre'],
            'apellido' => $post['apellido'],
            'dni' => $post['dni'],
            'email' => $post['email'],
            'telefono' => $post['telefono'],
            'genero' => $post['genero'],
            'fechadenacimiento' => $post['fechadenacimiento'],
        ]);

        // Actualizar estado inscripcion
        $estado = $post['estado'] ?? $ins['estado'];
        $this->model->actualizar($post['id'], ['estado' => $estado]);

        header("Location: index.php?action=inscripcionesTodas");
        exit;
    }
}
