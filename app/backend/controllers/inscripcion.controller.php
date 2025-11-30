<?php

require_once 'backend/models/inscripcion.model.php';
require_once 'backend/models/atleta.model.php';
require_once 'backend/models/carrera.model.php';
require_once 'frontend/lib/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevel;

class InscripcionController {

    private $model;
    private $smarty;

    public function __construct() {
        $this->model = new InscripcionModel();
        $this->smarty = new Smarty\Smarty();
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

    public function guardarPreinscripcion($post) {

        if (!$post) {
            echo "Datos inválidos";
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

        // 2) Crear la preinscripción y guardar ID
        $preinscripcion_id = $this->model->insertar([
            'atleta_id' => $atleta_id,
            'carrera_id' => $post['carrera_id'],
            'estado' => 'pendiente',
            'comprobante_pago' => null
        ]);

        // 3) Redirigir a confirmación
        header("Location: index.php?action=preinscripcionConfirmada&id=" . $preinscripcion_id);
        exit;
    }


    // LISTADO (admin)
    public function listarPreinscripciones() {
        $preinscripciones = $this->model->todos();

        $smarty = new Smarty\Smarty;
        $smarty->assign('titulo', 'Preinscripciones');
        $smarty->assign('preinscripciones', $preinscripciones);
        $smarty->display('frontend/templates/listarPreinscripciones.tpl');
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
            echo "Cupón no encontrado.";
            return;
        }

        
        // Datos que queremos en el QR
        $qrData  = "Atleta: {$pre['nombre']} {$pre['apellido']}\n";
        $qrData .= "Carrera: {$pre['carrera_nombre']}\n";
        $qrData .= "Estado: {$pre['estado']}\n";
        $qrData .= "ID Preinscripción: {$pre['id']}";

        $qrCode = new QrCode(data: $qrData, size: 200, margin: 10);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Convertir a base64 para poner en HTML
        $qrBase64 = base64_encode($result->getString());

        $this->smarty->assign('cupon', $pre);
        $this->smarty->assign('qr', $qrBase64);
        $this->smarty->display('frontend/templates/cupon_pago.tpl');
    }
    
    public function mostrarConfirmacion($idPreinscripcion) {
        if (!$idPreinscripcion) {
            echo "Preinscripción no encontrada.";
            return;
         }

        $pre = $this->model->uno($idPreinscripcion);

        if (!$pre) {
            echo "La preinscripción no existe.";
            return;
        }

        $this->smarty->assign('pre', $pre);
        $this->smarty->display('frontend/templates/preinscripcion_confirmada.tpl');
    }

    public function confirmarInscripcion($id) {
        $ins = $this->model->uno($id);

        if (!$ins) {
            echo "Inscripción no encontrada";
            return;
        }

        // 1. Obtener next pechera
        $pechera = $this->model->obtenerSiguientePechera($ins['carrera_id']);

        // 2. Calcular categoría (según género por ahora)
        $categoria = ($ins['genero'] === 'M') ? 'Masculino' : 'Femenino';

        // 3. Actualizar inscripción
        $this->model->confirmarInscripcion($id, [
            'estado' => 'inscripto',
            'pechera' => $pechera,
            'categoria' => $categoria,
            'pos_general' => 0,
            'pos_categoria' => 0,
            'finalizo' => false
        ]);

        // Opcional: emular envío de mail
        echo "<script>alert('Inscripto confirmado. Pechera: $pechera'); window.location='index.php?action=inscripcionesPagadas';</script>";
    }

    public function listarPendientes() {
        $inscripciones = $this->model->pendientesFuturas();
        $this->smarty->assign('inscripciones', $inscripciones);
        $this->smarty->display('frontend/templates/inscripciones_pendientes.tpl');
    }

    public function listarPagadas() {
        $inscripciones = $this->model->pagadasFuturas();
        $this->smarty->assign('inscripciones', $inscripciones);
        $this->smarty->display('frontend/templates/inscripciones_pagadas.tpl');
    }

}
