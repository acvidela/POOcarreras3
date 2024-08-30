<?php
require_once('lib\smarty\libs\Smarty.class.php');
require_once('..\backend\models\carrera.model.php');



$carreras = new Carrera();
$carreras = $carreras->proximas();  //Retorna las carreras con fecha >= hoy

$smarty = new Smarty\Smarty;           
$smarty->assign('titulo', 'Es-Tan-Dil - Próximas carreras');    
$smarty->assign('carreras', $carreras);                    
$smarty->display('templates\verproximascarreras.tpl');



?>