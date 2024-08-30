<!DOCTYPE html>
<html lang="es">

 {include 'templates/head.tpl'}

<body>
    <div class="container">
        {include 'templates/header.tpl'}

        <nav>
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carrears </a>
            <a href="verproximascarreras.php">Ver Próximas Carrearas</a>
    
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Resultados</h2>
            <table>
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Circuito</th>
                    <th scope="col">Fecha</th>      
                </tr>
                </thead>
                <tbody>
                {foreach from=$carreras item=carrera}
                    <tr>
                        <td>{$carrera->nombre}</td>
                        <td>{$carrera->circuito}</td>
                        <td>{$carrera->fecha}</td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
            <p>Se van a mostrar Carreras Terminadas, y al apretar se mostrarán los resultados de la carrera seleccionada</p>
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