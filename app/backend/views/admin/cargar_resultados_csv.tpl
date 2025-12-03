{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Cargar resultados</h2>

<form method="POST" enctype="multipart/form-data" action="importarResultados?id={$carrera_id}">
    <label>Archivo CSV:</label>
    <input type="file" name="archivo" accept=".csv,.txt" required>

    <button type="submit">Importar</button>
</form>

{/block}