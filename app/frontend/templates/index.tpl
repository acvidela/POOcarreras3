<!DOCTYPE html>
<html lang="es">

{include 'templates/head.tpl'}

<body>
    <div class="container">
        <header>
            <button class="mouse" onclick="cargainicio()">
                <img src="images/logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>
        </header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php">Ver Próximas Carreras</a>
            <a class="mouse" onclick="iniciodesecion()">Administrador</a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Bienvenido a Es-Tan-Dil</h2>
            <p>_________________________</p>
        </div>
           {include 'templates/footer.tpl'}
    </div>

    <script>
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
    </script>
</body>
</html>



