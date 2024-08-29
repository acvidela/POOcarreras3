<?php
require_once('config\conexion.php');  
require_once('models\carrera.model.php');

//MAIN

$db = Conexion::getConexion();
 
$carreras=new Carrera();
var_dump($carreras->todas());
var_dump($carreras->una(18));
$db = Conexion::closeConexion();