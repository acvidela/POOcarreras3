<!-- templates/formulario.tpl -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Administrador</title>
</head>
<body>
    <h2>Crear Administrador</h2>
    <form method="POST" action="create_admin.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
require_once('libs/Smarty.class.php');
require_once('libs/bcrypt.php'); // Asegúrate de tener una librería bcrypt para PHP

$smarty = new Smarty;
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

function encryptPassword($password) {
    // Primera encriptación
    $hashedPassword1 = password_hash($password, PASSWORD_BCRYPT);
    
    // Segunda encriptación
    $hashedPassword2 = password_hash($hashedPassword1, PASSWORD_BCRYPT);
    
    return $hashedPassword2;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $hashedPassword = encryptPassword($password);

    // Conexión a la base de datos
    $mysqli = new mysqli('localhost', 'tu_usuario', 'tu_contraseña', 'tu_base_de_datos');

    if ($mysqli->connect_error) {
        die('Error de conexión: ' . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare('INSERT INTO administrador (usuario, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $usuario, $hashedPassword);
    
    if ($stmt->execute()) {
        echo 'Administrador creado correctamente';
    } else {
        echo 'Error al crear el administrador: ' . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}

$smarty->display('formulario.tpl');
?>

