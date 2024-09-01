<!DOCTYPE html>
<html lang="es">

{include 'templates/head.tpl'}

<body>
    <div class="container">
        {include 'templates/header.tpl'}

        <nav>
            <a href="../index.php">Inicio</a>
            <a href="verresultadoscarreras.php">Resultados de Carreras</a>
            <a href="verproximascarreras.php">Ver Próximas Carreras</a>
        </nav>
        <div class="container">
            {foreach from=$carrera item=carreraMostrar}
            <h2>Clasificación de carrera {$carreraMostrar->nombre}</h2>
            {/foreach}
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
                            <caption>Resultados carrera</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Pechera</th>
                                    <th scope="col">Posición general</th>
                                    <th scope="col">Posición Categoría</th>
                                    <th scope="col">Categoría</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$resultados item=resultado}
                                <tr>
                                    <td>{$resultado->nombre}</td>
                                    <td>{$resultado->id}</td>
                                    <td>{$resultado->pos_general}</td>
                                    <td>{$resultado->pos_categoria}</td>
                                    <td>{$resultado->categoria}</td> 
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div><!--end of .table-responsive-->
                </div>
            </div>
        </div>
        {include 'templates/footer.tpl'}
    </div>

    <script>
        function cargainicio() {
            window.location.href = '../index.php';
        }
       
    </script>

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
    </style>


</body>
</html>
