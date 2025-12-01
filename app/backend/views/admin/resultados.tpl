{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Resultados</h2>

<table class="tabla-admin">
    <tr>
        <th>Pos.</th>
        <th>Dorsal</th>
        <th>Nombre</th>
        <th>Tiempo</th>
        <th>Categoría</th>
        <th>Pos. Cat.</th>
    </tr>

    {foreach $resultados as $r}
    <tr>
        <td>{$r.pos_general}</td>
        <td>{$r.dorsal}</td>
        <td>{$r.nombre} {$r.apellido}</td>
        <td>{$r.tiempo}</td>
        <td>{$r.categoria}</td>
        <td>{$r.pos_categoria}</td>
    </tr>
    {/foreach}

</table>

{/block}
