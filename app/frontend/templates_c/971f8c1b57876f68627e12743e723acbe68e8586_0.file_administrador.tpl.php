<?php
/* Smarty version 5.4.0, created on 2024-09-12 01:29:58
  from 'file:templates\administrador.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66e227f65fc973_78445558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '971f8c1b57876f68627e12743e723acbe68e8586' => 
    array (
      0 => 'templates\\administrador.tpl',
      1 => 1726097394,
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
function content_66e227f65fc973_78445558 (\Smarty\Template $_smarty_tpl) {
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
            <div class="column">
                <a class="accordion">Carreras</a>
                <div class="panel">
                    <a href="#" onclick="showForm()">Agregar una Carrera</a>
                    <a href="#" onclick="showForm()">Editar una Carrera</a>
                    <a href="#" onclick="showForm()">Eliminar una Carrera</a>
                </div>
            </div>
            <div class="column">
                <a class="accordion">Participantes</a>
                <div class="panel">
                    <a href="#" onclick="showForm()">Agregar una Participante</a>
                    <a href="#" onclick="showForm()">Editar una Participante</a>
                    <a href="#" onclick="showForm()">Eliminar una Participante</a>
                </div>
            </div>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <div id="form-container">
                <p></p>
            </div>
        </div>
        <?php $_smarty_tpl->renderSubTemplate('file:templates/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    </div>

    <?php echo '<script'; ?>
>
        function cargainicio() {
            window.location.href = 'index.php';
        }

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        function showForm() {
            const formContainer = document.getElementById('form-container');
            formContainer.innerHTML = `
                   <form>
                    <label for="name">opcion1:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="name">opcion2:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="name">opcion3:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="opcion4">Email:</label>
                    <input type="email" id="email" name="email"><br><br>
                    <input type="submit" value="Enviar">
                </form>
            `;
        }
    <?php echo '</script'; ?>
>
    <style>
        .accordion {
            cursor: pointer;
        }

        .panel {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: grey;
            border-radius: 15px;
        }

        .panel a {
            display: block;
            padding: 10px 0;
        }

        .panel a:hover {
            background-color: grey;
        }

        .column {
            display: flex;
            flex-direction: column;
        }

        #form-container {
            margin-top: 20px;
        }
    </style>
</body>
</html>
<?php }
}
