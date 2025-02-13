<?php
/* Smarty version 5.4.0, created on 2025-02-13 22:47:08
  from 'file:templates\verproximascarreras.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ae685c4433e8_69325714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a735ee512df148129ea9c3e10ba5dc3be2954e99' => 
    array (
      0 => 'templates\\verproximascarreras.tpl',
      1 => 1738979162,
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
function content_67ae685c4433e8_69325714 (\Smarty\Template $_smarty_tpl) {
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
              <td><button type="button" onclick="showPopup()">Quiero Participar!</button></td>
              <div class="overlay" id="overlay" onclick="hidePopup()"></div>
              <div class="popup" id="popup">
         <form>
            <h2>Formulario de Participación</h2>
            <label for="name">Nombre y apellido:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="dob">Fecha de nacimiento:</label>
            <input type="date" id="dob" name="dob" required><br><br>
            <label for="gender">Sexo:</label>
            <select id="gender" name="gender" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select><br><br>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required><br><br>
            <button type="submit">Enviar</button>
            <button type="button" onclick="hidePopup()">Cerrar</button>
        </form>
    </div>
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
         function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
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
 /* Estilos para el pop-up */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Estilos para el fondo oscuro */
        .overlay {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
          }
        </style>

</body>
</html><?php }
}
