<!DOCTYPE html>
<php lang="en">
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
            <a href="../inicio.php">Inicio</a>
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

    <script>
        function cargainicio() {
            window.location.href = '../inicio.php';
        }
    </script>

</body>
</php>