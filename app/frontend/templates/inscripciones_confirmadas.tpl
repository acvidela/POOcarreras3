<h2>Inscriptos Confirmados</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>Pechera</th>
        <th>Atleta</th>
        <th>Categoría</th>
        <th>Carrera</th>
        <th>Acciones</th>
    </tr>

    {foreach $inscripciones as $i}
    <tr>
        <td>{$i.pechera}</td>
        <td>{$i.atleta_nombre} {$i.atleta_apellido}</td>
        <td>{$i.categoria}</td>
        <td>{$i.carrera_nombre}</td>

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
