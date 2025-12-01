{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}
<h2>Carreras finalizadas</h2>

<table class="tabla-admin">
    <tr>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Circuito</th>
        <th>Precio</th>
        <th>Resultados</th>

    </tr>

    {foreach $carreras as $c}
    <tr>
        <td>{$c->nombre}</td>
        <td>{$c->fecha}</td>
        <td>{$c->circuito}</td>
        <td>$ {$c->precio}</td>
        <td>
            <!-- Ver resultados -->
            <a href="index.php?action=verResultadosAdmin&id={$c->id}">
            Ver resultados
            </a>
            &nbsp;|&nbsp;

            <!-- Cargar resultados -->
            <a href="index.php?action=cargarResultados&id={$c->id}">
            Cargar/modificar resultados
            </a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($carreras) == 0}
<p>No hay icarreras pendientes.</p>
{/if}
{/block}