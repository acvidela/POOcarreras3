<?php
/* Smarty version 5.4.0, created on 2024-08-22 17:16:18
  from 'file:..\templates\verproximascarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66c75642e9a670_25021949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f79d4a0fbf298c6f0ba0d06160db79a3deca97a' => 
    array (
      0 => '..\\templates\\verproximascarreras.tpl',
      1 => 1724339271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66c75642e9a670_25021949 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\POOcarreras3\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo.png">
    <link rel="stylesheet" href="../styles.css">
    <title>Es-Tan-Dil</title>

</head>
<body>
    <div class="container">
        <header>

             <button class="mouse" onclick="cargainicio()">
                <img src="../logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>
            
        </header>
        <nav>
            <a href="../../index.php">Inicio</a>
            <a href="../verresultadoscarreas/verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php"> Ver Proximas Carreras</a>
            <a href="#"></a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Proximas Carreras</h2>
            <p>Se van a mostrar Futuras carreras, con un boton para inscribirse</p>
        </div>
        <footer>
            &copy; 2024 Es-Tan-Dil. Todos los derechos reservados.
        </footer>
    </div>

    <?php echo '<script'; ?>
>
        function cargainicio() {
            window.location.href = '../../index.php';
        }
    <?php echo '</script'; ?>
>

</body>
</html><?php }
}
