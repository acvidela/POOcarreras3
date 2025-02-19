<?php
/* Smarty version 5.4.0, created on 2025-02-19 22:50:01
  from 'file:templates\verresultadoscarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b65209e24ac6_09000602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fee0031a565d066527b0eb624e3600e6c23a43bc' => 
    array (
      0 => 'templates\\verresultadoscarreras.tpl',
      1 => 1740001689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
    'file:templates/header.tpl' => 1,
    'file:templates/navbarIndex.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
))) {
function content_67b65209e24ac6_09000602 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\POOcarreras3\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<body>
    <div class="container">
        <?php $_smarty_tpl->renderSubTemplate('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

        <?php $_smarty_tpl->renderSubTemplate('file:templates/navbarIndex.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
                            <caption>Resultados</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Circuito</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Resultados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carreras'), 'carrera');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carrera')->value) {
$foreach0DoElse = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->getValue('carrera')->nombre;?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('carrera')->circuito;?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('carrera')->fecha;?>
</td>
                                    <td><button type="button" onclick="window.location.href='resultadoCarrera.php?id=<?php echo $_smarty_tpl->getValue('carrera')->id;?>
'">Ver Resultados</button></td> 
                                </tr>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div><!--end of .table-responsive-->
                </div>
            </div>
        </div>
        <?php $_smarty_tpl->renderSubTemplate('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

    <?php echo '<script'; ?>
>
        function cargainicio() {
            window.location.href = '../index.php';
        }
       
    <?php echo '</script'; ?>
>

    <style>

button {
  background-color: Darkgrey;
  border-radius: 12px;  /* Mantén uno de los border-radius */
  border: 2px solid Black;
  color: Black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transition: background-color 0.3s 
}

button:hover {
    background-color: White;
}
    </style>


</body>
</html>
<?php }
}
