<h2>Inscripciones Pendientes</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>Atleta</th>
        <th>DNI</th>
        <th>Carrera</th>
        <th>Fecha carrera</th>
        <th>Fecha preinscipción</th>
        <th>Acciones</th>
    </tr>

    {foreach $inscripciones as $i}
    <tr>
        <td>{$i.atleta_nombre} {$i.atleta_apellido}</td>
        <td>{$i.atleta_dni}</td>
        <td>{$i.carrera_nombre}</td>
        <td>{$i.carrera_fecha}</td>
        <td>{$i.fecha_inscripcion}</td>

        <td>
            <!-- Ver cupón -->
            <a href="index.php?action=cuponPago&id={$i.id}">
            Ver cupón
            </a>
            &nbsp;|&nbsp;

            <!-- Marcar como pagado -->
            <a href="index.php?action=actualizarEstadoPreinscripcion&id={$i.id}&estado=pagado">
            Marcar como pagado
            </a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($inscripciones) == 0}
<p>No hay inscripciones pendientes.</p>
{/if}
