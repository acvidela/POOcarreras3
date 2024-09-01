<?php
require_once('config\conexion.php');  
require_once('models\carrera.model.php');
require_once('models\participante.model.php');
require_once('models\atleta.model.php');

//MAIN

$db = Conexion::getConexion();
 
$carreras=new Carrera();
$participantes = new Participante();
$atletas = new Atleta();
//var_dump($carreras->todas());

//var_dump($carreras->una(8));
//var_dump($carreras->anteriores());
//var_dump($participantes->todos());
//var_dump($participantes->uno(7));
var_dump($participantes->todosEnCarrera(1));
//echo "todos los atletas\n";
//var_dump($atletas->todos());
//echo "un atleta\n";
//var_dump($atletas->uno(7));
$db = Conexion::closeConexion();