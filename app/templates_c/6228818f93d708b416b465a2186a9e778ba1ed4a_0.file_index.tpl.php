<?php
/* Smarty version 5.4.0, created on 2024-08-22 20:31:11
  from 'file:frontend\templates\index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66c783ef826a32_19047737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6228818f93d708b416b465a2186a9e778ba1ed4a' => 
    array (
      0 => 'frontend\\templates\\index.tpl',
      1 => 1724351441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/head.tpl' => 1,
  ),
))) {
function content_66c783ef826a32_19047737 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\POOcarreras3\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<?php $_smarty_tpl->renderSubTemplate('file:../templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<body>
    <div class="container">
        <header>
            <button class="mouse" onclick="cargainicio()">
                <img src="frontend/logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>
        </header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="frontend/verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="frontend/verproximascarreras.php">Ver Próximas Carreras</a>
            <a class="mouse" onclick="iniciodesecion()">Administrador</a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Bienvenido a Es-Tan-Dil</h2>
            <p>_________________________</p>
        </div>
        <footer>
            © 2024 Es-Tan-Dil. Todos los derechos reservados.
        </footer>
    </div>

    <?php echo '<script'; ?>
>
        function cargainicio() {
            window.location.href = 'index.php';
        }

        function iniciodesecion() {
            const username = prompt('Ingrese su nombre de usuario:');
            const password = prompt('Ingrese su contraseña:');
            // Aquí puedes validar las credenciales o realizar otras acciones
            if (username && password) {
                alert('Bienvenido, ' + username + '!');
            } else {
                alert('Inicio de sesión cancelado.');
            }
        }
    <?php echo '</script'; ?>
>
</body>
</html>



<?php }
}
