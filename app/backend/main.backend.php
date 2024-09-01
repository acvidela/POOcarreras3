<?php
require_once('config\conexion.php');  
require_once('models\carrera.model.php');
require_once('models\participante.model.php');

//MAIN

$db = Conexion::getConexion();
 
$carreras=new Carrera();
$participantes = new Participante();
//var_dump($carreras->todas());
//var_dump($carreras->una(18));
//var_dump($carreras->anteriores());
var_dump($participantes->todos());
var_dump($participantes->uno(7));
var_dump($participantes->todosEnCarrera(1));
$db = Conexion::closeConexion();