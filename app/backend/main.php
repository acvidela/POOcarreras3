<?php
require_once('config\conexion.php');  
require_once('models\carrera.model.php');

//MAIN

$db = Conexion::getConexion();
 
$carreras=new Carreras();
var_dump($carreras->todas());

$db = Conexion::closeConexion();