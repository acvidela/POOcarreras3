<!DOCTYPE html>
<html lang="es">

{include 'frontend/templates/head.tpl'}

<body>
    <div class="container">
        {include 'frontend/templates/header.tpl'}

        {include 'frontend/templates/navbarIndex.tpl'}
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table summary="This table shows how to create responsive tables using RWD-Table-Patterns' functionality" class="table table-bordered table-hover">
                            <caption>Resultados</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Circuito</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Resultados</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$carreras item=carrera}
                                <tr>
                                    <td>{$carrera->nombre}</td>
                                    <td>{$carrera->circuito}</td>
                                    <td>{$carrera->fecha}</td>
                                    <td><button type="button" onclick="window.location.href='resultadoCarrera?id={$carrera->id}'">Ver Resultados</button></td>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div><!--end of .table-responsive-->
                </div>
            </div>
        </div>
        {include 'frontend/templates/footer.tpl'}
    </div>

    <script>
        function cargainicio() {
            window.location.href = '../index.php';
        }
       
    </script>

    <style>

button {
  background-color: Darkgrey;
  border-radius: 12px;  /* Mantén uno de los border-radius */
  border: 2px solid Black;
  color: Black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transition: background-color 0.3s 
}

button:hover {
    background-color: White;
}
    </style>


</body>
</html>
