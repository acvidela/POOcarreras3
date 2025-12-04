{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}
<h2>Próximas Carreras</h2>

<table class="tabla-admin">
    <tr>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Circuito</th>
        <th>Precio</th>
        <th>Inscripciones</th>
        <th>Acciones</th>
    </tr>

    {foreach $carreras as $c}
    <tr>
        <td>{$c.nombre}</td>
        <td>{$c.fecha}</td>
        <td>{$c.circuito}</td>
        <td>$ {$c.precio}</td>
        <td>
            <!-- Ver cantidad inscriptos -->
            <a class="btn" href="index.php?action=verCantidadInscriptos&id={$c.id}">Cantidad confirmados</a>
           <!-- Ver cantidad preinscriptos -->
            <a class="btn" href="index.php?action=verCantidadPendientes&id={$c.id}">Sin confirmar</a>
        </td>
        <td>
            <a class="btn" href="index.php?action=editarCarrera&id={$c.id}">Editar</a>
            <a class="btn btn-danger" href="index.php?action=eliminarCarrera&id={$c.id}" onclick="return confirm('Eliminar esta carrera?');">Eliminar</a>
        </td>
    </tr>
    {/foreach}
</table>

{if count($carreras) == 0}
<p>No hay carreras próximas.</p>
{/if}
{/block}
