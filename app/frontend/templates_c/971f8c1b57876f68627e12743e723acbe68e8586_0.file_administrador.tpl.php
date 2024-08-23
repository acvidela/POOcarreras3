<?php
/* Smarty version 5.4.0, created on 2024-08-24 00:30:28
  from 'file:templates\administrador.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66c90d84369d41_98862932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '971f8c1b57876f68627e12743e723acbe68e8586' => 
    array (
      0 => 'templates\\administrador.tpl',
      1 => 1724452219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
))) {
function content_66c90d84369d41_98862932 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\POOcarreras3\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<body>
    <div class="container">
        <header>
            
            <button class="mouse" onclick="cargainicio()">
              <img src="logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>

        </header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="">Carreras</a>
            <a href="">Corredores</a>
            <a href="#"></a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>administrador</h2>
            <p></p>
        </div>
           <?php $_smarty_tpl->renderSubTemplate('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

    <?php echo '<script'; ?>
>
        function cargainicio() {
            window.location.href = 'index.php';
        }
    <?php echo '</script'; ?>
>

</body>
</html><?php }
}
