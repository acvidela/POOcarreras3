<h2>Inscripciones Pagadas (Próximas Carreras)</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>Atleta</th>
        <th>Carrera</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>

    {foreach $inscripciones as $i}
    <tr>
        <td>{$i.atleta_nombre} {$i.atleta_apellido}</td>
        <td>{$i.carrera_nombre}</td>
        <td>{$i.fecha}</td>

        <td>
            <a href="index.php?action=confirmarInscripcion&id={$i.id}">
                Confirmar inscripción
            </a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($inscripciones) == 0}
<p>No hay inscripciones pagadas para carreras futuras.</p>
{/if}
