<?php   
    require_once('lib\smarty\libs\Smarty.class.php');
    require_once('../backend/models/carrera.model.php');
    require_once('../backend/models/participante.model.php');

    $id = $_REQUEST['id'];
    $carreras = new Carrera();
    $carrera = $carreras->una($id);
  
    $participantes = new Participante();
    $resultados = $participantes->todosEnCarrera($id);  //Trae a los participantes de una carrera con su clasificación y datos de la tabla atletas 

    $smarty = new Smarty\Smarty;           
    $smarty->assign('titulo', 'Es-Tan-Dil - Resultado carrera');  
    $smarty->assign('carrera', $carrera);  
    $smarty->assign('resultados',$resultados);                
    
    $smarty->display('templates\resultadoCarrera.tpl');
    
?>