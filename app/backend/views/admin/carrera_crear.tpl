{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>{if $carrera}Editar carrera{else}Crear nueva carrera{/if}</h2>

<form action="index.php?action=guardarCarrera" method="post" class="form-admin">
    {if $carrera}
        <input type="hidden" name="id" value="{$carrera->id}">
    {/if}

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{$carrera->nombre|default:''}" required><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" value="{$carrera->fecha|default:''}" required><br><br>

    <label>Circuito:</label><br>
    <input type="text" name="circuito" value="{$carrera->circuito|default:''}" required><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" value="{$carrera->precio|default:''}" required><br><br>

    <button type="submit">{if $carrera}Guardar cambios{else}Crear carrera{/if}</button>

</form>

{/block}
