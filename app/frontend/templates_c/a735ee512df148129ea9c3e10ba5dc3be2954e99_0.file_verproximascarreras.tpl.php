<?php
/* Smarty version 5.4.0, created on 2024-08-29 15:10:40
  from 'file:templates\verproximascarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66d0735063c7f8_75188120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a735ee512df148129ea9c3e10ba5dc3be2954e99' => 
    array (
      0 => 'templates\\verproximascarreras.tpl',
      1 => 1724936781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
))) {
function content_66d0735063c7f8_75188120 (\Smarty\Template $_smarty_tpl) {
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
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php"> Ver Proximas Carreras</a>
            <a href="#"></a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Proximas Carreras</h2>
            <p>Se van a mostrar Futuras carreras, con un boton para inscribirse</p>
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
