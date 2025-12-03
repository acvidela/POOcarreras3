{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<!-- Resumen -->
<section class="stats-grid">

    <div class="stat-box">
        <p class="stat-label">Carreras totales</p>
        <p class="stat-value">{$stats.total_carreras}</p>
    </div>

    <div class="stat-box">
        <p class="stat-label">Próximas</p>
        <p class="stat-value">{$stats.proximas}</p>
    </div>

    <div class="stat-box">
        <p class="stat-label">Finalizadas</p>
        <p class="stat-value">{$stats.anteriores}</p>
    </div>

    <div class="stat-box">
        <p class="stat-label">Participantes</p>
        <p class="stat-value">{$stats.participantes}</p>
    </div>

</section>

<!-- Alertas -->
<section class="alerts">
    <h2>Alertas</h2>

    {if $alertas|@count > 0}
        <ul>
        {foreach from=$alertas item=alerta}
            <li>{$alerta}</li>
        {/foreach}
        </ul>
    {else}
        <p>No hay alertas por ahora.</p>
    {/if}
</section>

<!-- Últimas carreras -->
<section class="recent">
    <h2>Últimas carreras</h2>

    {if $carrerasRecientes|@count > 0}
        <table class="tabla-admin">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Circuito</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$carrerasRecientes item=carrera}
                <tr>
                    <td>{$carrera->nombre}</td>
                    <td>{$carrera->circuito}</td>
                    <td>{$carrera->fecha}</td>
                    <td>
                        <a class="btn" href="index.php?action=editarCarrera&id={$carrera->id}">Editar</a>
                        <a class="btn btn-danger" href="index.php?action=eliminarCarrera&id={$carrera->id}" onclick="return confirm('Eliminar esta carrera?');">Eliminar</a>
                        <a class="btn" href="resultadoCarrera?id={$carrera->id}">Ver resultados</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>Aún no hay carreras cargadas.</p>
    {/if}
</section>

<div id="form-carrera-container"></div>

{/block}
