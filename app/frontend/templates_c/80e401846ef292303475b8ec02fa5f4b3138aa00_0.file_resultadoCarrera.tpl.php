<?php
/* Smarty version 5.4.0, created on 2024-09-01 23:52:34
  from 'file:templates\resultadoCarrera.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66d4e22200dde0_59819119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80e401846ef292303475b8ec02fa5f4b3138aa00' => 
    array (
      0 => 'templates\\resultadoCarrera.tpl',
      1 => 1725227547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
))) {
function content_66d4e22200dde0_59819119 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\POOcarreras3\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<body>
    <div class="container">
        <?php $_smarty_tpl->renderSubTemplate('file:templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

        <nav>
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php">Ver Próximas Carreras</a>
        </nav>
        <div class="container">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('carrera'), 'carreraMostrar');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('carreraMostrar')->value) {
$foreach0DoElse = false;
?>
            <h2>Clasificación de carrera <?php echo $_smarty_tpl->getValue('carreraMostrar')->nombre;?>
</h2>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
                            <caption>Resultados carrera</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Pechera</th>
                                    <th scope="col">Posición general</th>
                                    <th scope="col">Posición Categoría</th>
                                    <th scope="col">Categoría</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('resultados'), 'resultado');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('resultado')->value) {
$foreach1DoElse = false;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->getValue('resultado')->nombre;?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('resultado')->id;?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('resultado')->pos_general;?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('resultado')->pos_categoria;?>
</td>
                                    <td><?php echo $_smarty_tpl->getValue('resultado')->categoria;?>
</td> 
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
    border: 2px solid Black ;
    color: Black ;
    padding: 10px 20px ;
    text-align: center ;
    text-decoration: none ;
    display: inline-block ;
    font-size: 16px ;
    margin: 4px 2px ;
    cursor: pointer ;
    border-radius: 12px !; 
    transition: background-color 0.3s ease ; 
}

button:hover {
    background-color: White;
}
    </style>


</body>
</html>
<?php }
}
