<!DOCTYPE html>
<html lang="es">

{include 'templates/head.tpl'}

<body>
    <div class="container">
        <header>
            
            <button class="mouse" onclick="cargainicio()">
                <img src="logo-inicio.png" alt="Boton Inicio" width="20%" height="20%">
            </button>
        
        </header>
        <nav>
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carrears </a>
            <a href="verproximascarreras.php">Ver Próximas Carrearas</a>
    
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Resultados</h2>
            <p>Se van a mostrar Carreras Terminadas, y al apretar se mostraran los resultados de la carrera seleccionada</p>
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