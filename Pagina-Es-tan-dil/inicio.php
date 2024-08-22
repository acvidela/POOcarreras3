<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Aquí puedes validar las credenciales o realizar otras acciones
    if ($username && $password) {
        echo "Bienvenido, $username!";
    } else {
        echo "Inicio de sesión cancelado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Es-Tan-Dil</title>
</head>
<body>
    <div class="container">
        <header>
            <button class="mouse" onclick="cargainicio()">
                <img src="logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>
        </header>
        <nav>
            <a href="inicio.php">Inicio</a>
            <a href="verresultadoscarreas/verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarrears/verproximascarreras.php">Ver Próximas Carreras</a>
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

    <script>
        function cargainicio() {
            window.location.href = 'inicio.php';
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
    </script>
</body>
</html>
