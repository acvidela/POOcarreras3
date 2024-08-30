<!DOCTYPE html>
<html lang="es">

{include 'templates/head.tpl'}

<body>
    <div class="container">
        {include 'templates/header.tpl'}
        <nav>
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php"> Ver Proximas Carreras</a>
            <a href="#"></a>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Proximas Carreras</h2>
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
            <p>Hay que agregar un botón para más detalles como precio y kit y con un boton para inscribirse</p>
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