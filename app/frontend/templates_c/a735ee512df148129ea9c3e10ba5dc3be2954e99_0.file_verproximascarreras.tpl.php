<?php
/* Smarty version 5.4.0, created on 2024-08-31 22:56:39
  from 'file:templates\verproximascarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66d383879f6c96_33500370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a735ee512df148129ea9c3e10ba5dc3be2954e99' => 
    array (
      0 => 'templates\\verproximascarreras.tpl',
      1 => 1725137792,
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
function content_66d383879f6c96_33500370 (\Smarty\Template $_smarty_tpl) {
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
            <a href="verproximascarreras.php"> Ver Proximas Carreras</a>
            <a href="#"></a>
        </nav>
        <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive" data-pattern="priority-columns">
        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
          <caption>Proximas Carreras</caption>
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Circuito</th>
              <th scope="col">Fecha</th>
              <th scope="col">Inscripciones</th> 
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
              <td><button type="button">Quiero Participar!</button></td>
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
</html><?php }
}
