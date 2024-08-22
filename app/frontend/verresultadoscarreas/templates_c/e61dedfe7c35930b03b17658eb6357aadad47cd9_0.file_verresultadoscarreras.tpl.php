<?php
/* Smarty version 5.4.0, created on 2024-08-22 17:19:09
  from 'file:..\templates\verresultadoscarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66c756eda074a1_81638237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e61dedfe7c35930b03b17658eb6357aadad47cd9' => 
    array (
      0 => '..\\templates\\verresultadoscarreras.tpl',
      1 => 1724339892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66c756eda074a1_81638237 (\Smarty\Template $_smarty_tpl) {
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
            <a href="verresultadoscarreras.php">Resultados de Carrears </a>
            <a href="../verproximascarreras/verproximascarreras.php">Ver Proximas Carrearas</a>
    
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Resultados</h2>
            <p>Se van a mostrar Carreras Terminadas, y al apretar se mostraran los resultados de la carrera seleccionada</p>
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
