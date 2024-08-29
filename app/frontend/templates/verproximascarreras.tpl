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
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php"> Ver Proximas Carreras</a>
            <a href="#"></a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Proximas Carreras</h2>
            <p>Se van a mostrar Futuras carreras, con un boton para inscribirse</p>
        </div>
     {include 'templates/footer.tpl'}
    </div>

    <script>
        function cargainicio() {
            window.location.href = '../index.php';
        }
    </script>

</body>
</html>