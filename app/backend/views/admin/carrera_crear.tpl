{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Crear nueva carrera</h2>

<form action="index.php?action=guardarCarrera" method="post" class="form-admin">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" required><br><br>

    <label>Circuito:</label><br>
    <input type="text" name="circuito" required><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" required><br><br>

    <button type="submit">Crear carrera</button>

</form>

{/block}
