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
            <a class="btn" href="index.php?action=verResultadosAdmin&id={$c->id}">Ver resultados</a>
            <a class="btn" href="index.php?action=cargarResultadosManual&id={$c->id}">Editar resultados</a>
            <a class="btn" href="index.php?action=cargarResultadosCsv&id={$c->id}">Importar resultados</a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($carreras) == 0}
<p>No hay carreras pendientes.</p>
{/if}
{/block}
