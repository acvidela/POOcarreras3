{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Historico de preinscripciones</h2>

<table class="tabla-admin">
    <tr>
        <th>Atleta</th>
        <th>DNI Atleta</th>
        <th>Carrera</th>
        <th>Fecha de carrera</th>
        <th>Estado de inscripción</th>
        <th>Fecha de preinscripción</th>
        <th>Acciones</th>
    </tr>

    {foreach $inscripciones as $i}
    <tr>
        <td>{$i.atleta_nombre} {$i.atleta_apellido}</td>
        <td>{$i.atleta_dni}</td>
        <td>{$i.carrera_nombre}</td>
        <td>{$i.carrera_fecha}</td>
        <td>{$i.estado}</td>
        <td>{$i.fecha_inscripcion}</td>
        <td class="action-buttons">
            <a class="btn" href="index.php?action=editarInscripcion&id={$i.id}">Editar</a>
            <a class="btn btn-danger" href="index.php?action=eliminarPreinscripcion&id={$i.id}" onclick="return confirm('Eliminar esta inscripcion?');">Eliminar</a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($inscripciones) == 0}
<p>No hay inscriptos/preinscriptos.</p>
{/if}
{/block}
