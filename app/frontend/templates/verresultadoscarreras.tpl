<!DOCTYPE html>
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

    <script>
        function cargainicio() {
            window.location.href = '../../index.php';
        }
    </script>

</body>
</html>