<?php
/* Smarty version 5.4.0, created on 2024-08-29 18:47:51
  from 'file:..\templates\verresultadoscarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66d0a6370ffa08_41053786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '697c57af543a7b70fe26155d2bec96092426906b' => 
    array (
      0 => '..\\templates\\verresultadoscarreras.tpl',
      1 => 1724950020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
))) {
function content_66d0a6370ffa08_41053786 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\POOcarreras3\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<body>
    <div class="container">
        <header>
            
            <button class="mouse" onclick="cargainicio()">
                <img src="images/logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>
        
        </header>
        <nav>
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carrears </a>
            <a href="verproximascarreras.php">Ver Próximas Carrearas</a>
    
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Resultados</h2>
            <table>
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Circuito</th>
                    <th scope="col">Fecha</th>      
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
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
            <p>Se van a mostrar Carreras Terminadas, y al apretar se mostrarán los resultados de la carrera seleccionada</p>
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

</body>
</html><?php }
}
