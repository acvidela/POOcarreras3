{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Cargar resultados</h2>

<form method="POST" action="guardarResultados">
<input type="hidden" name="carrera_id" value="{$carrera_id}">

<table class="tabla-admin">
    <tr>
        <th>Dorsal</th>
        <th>Nombre</th>
        <th>Tiempo</th>
        <th>Pos. General</th>
        <th>Categoría</th>
        <th>Pos. Categoría</th>
    </tr>

    {foreach $inscripciones as $i}
        <tr>
            <td>{$i.dorsal}</td>
            <td>{$i.nombre} {$i.apellido}</td>

            <td><input type="text" name="tiempo[]" placeholder="00:35:12"></td>
            <td><input type="number" name="pos_general[]" min="1"></td>
            <td><input type="text" name="categoria[]"></td>
            <td><input type="number" name="pos_categoria[]" min="1"></td>

            <input type="hidden" name="inscripcion_id[]" value="{$i.id}">
        </tr>
    {/foreach}
</table>

<button type="submit" class="btn">Guardar resultados</button>

</form>

{/block}