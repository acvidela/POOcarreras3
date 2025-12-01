{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Inscriptos Confirmados</h2>

<table class="tabla-admin">
    <tr>
        <th>Pechera</th>
        <th>Atleta</th>
        <th>Categoría</th>
        <th>Carrera</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>

    {foreach $inscripciones as $i}
    <tr>
        <td>{$i.pechera}</td>
        <td>{$i.atleta_nombre} {$i.atleta_apellido}</td>
        <td>{$i.categoria}</td>
        <td>{$i.carrera_nombre}</td>
        <td>{$i.carrera_fecha}</td>

        <td>
            <a href="index.php?action=verInscripto&id={$i.id}">
                Ver detalle
            </a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($inscripciones) == 0}
<p>No hay inscriptos confirmados.</p>
{/if}
{/block}
