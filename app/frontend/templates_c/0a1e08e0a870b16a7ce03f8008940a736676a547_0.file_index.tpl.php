<?php
/* Smarty version 5.4.0, created on 2025-02-13 23:37:37
  from 'file:templates\index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ae7431cfc8a0_15808045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a1e08e0a870b16a7ce03f8008940a736676a547' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1739486254,
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
function content_67ae7431cfc8a0_15808045 (\Smarty\Template $_smarty_tpl) {
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
            <a href="index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php">Ver Próximas Carreras</a>
            <a class="mouse" onclick="iniciodesesion()">Administrador</a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Bienvenido a Es-Tan-Dil</h2
            <p>Somos un grupo apasionado por el Atletismo y la naturaleza, dedicados a organizar carreras inolvidables en las hermosas sierras de Tandil, Nuestros objetivo es fomentar un estilo de vida saludable y conectar a las personas la naturaleza de nuestra ciudad a traves del deporte</p>
            <h2>Estos son los lugares por donde podes llegar a pasar!</h2>
            <section class="galeria">
            <img src="https://as1.ftcdn.net/v2/jpg/03/90/19/48/1000_F_390194899_CEDg71PI6Uxb0UaoLkZNrO8zNx8lX0hZ.jpg"</img>
            <img src="https://photo620x400.mnstatic.com/def2c358c3ad724c60622558ba514f64/tandil.jpg"</img>
            <img src="https://as1.ftcdn.net/jpg/04/32/05/48/1000_F_432054803_vvVpwJLGs2UlEBpSPqNrJ1SwFjnaILG3.jpg"</img>
            <img src="https://as1.ftcdn.net/v2/jpg/07/70/83/86/1000_F_770838641_ml0Pgj3q8DirP8dWgIq11HmLgpZRRntp.jpg"</img>
            </section>
            <h2>¿Y vos, te lo vas a perder?</h2>
        </div>
           <?php $_smarty_tpl->renderSubTemplate('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

    <?php echo '<script'; ?>
>
        function cargainicio() {
            window.location.href = 'index.php';
        }

        function iniciodesesion() {
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

@font-face {
    font-family: 'Rubikmaps';
    src: url('../styles/fonts/Rubikmaps-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

h2 {
    font-family: 'Rubikmaps', sans-serif;
    width: 100%;
    text-align: center;
    margin-bottom: 5%;
}
.galeria {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Espacio entre las imágenes */
    justify-content: center; /* Centrar las imágenes horizontalmente */
    margin: 20px;
}

.galeria img {
    width: 48%; /* Ajusta el ancho de las imágenes */
    height: auto; /* Mantén la proporción de las imágenes */
    border: 2px solid #ccc; /* Opcional: añade un borde a las imágenes */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Opcional: añade una sombra a las imágenes */
}
</style


<?php }
}
