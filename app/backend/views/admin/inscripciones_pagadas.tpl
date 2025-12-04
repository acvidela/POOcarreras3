{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Inscripciones Pagadas (Proximas Carreras)</h2>

<table class="tabla-admin">
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
            <a class="btn" href="index.php?action=confirmarInscripcion&id={$i.id}">
                Confirmar inscripcion
            </a>
        </td>
    </tr>
    {/foreach}
</table>
{if isset($flash)}
<div class="flash-ok">
    {$flash}
</div>
{/if}
{if count($inscripciones) == 0}
<p>No hay inscripciones pagadas para carreras futuras.</p>
{/if}
{/block}
