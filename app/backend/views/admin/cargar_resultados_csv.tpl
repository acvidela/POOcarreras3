{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Cargar resultados</h2>

<div class="card-form">
    <p>Sube un archivo CSV con los resultados para esta carrera. Asegurate de que los encabezados coincidan y usa UTF-8.</p>

    <form method="POST" enctype="multipart/form-data" action="importarResultados?id={$carrera_id}">
        <label for="archivo">Archivo CSV</label>
        <input id="archivo" type="file" name="archivo" accept=".csv,.txt" required>

        <div class="form-actions">
            <button type="submit" class="btn">Importar</button>
            <a class="btn" href="index.php?action=cargarResultadosManual&id={$carrera_id}">Cargar manualmente</a>
        </div>
    </form>
</div>

<style>
.card-form {
    background: white;
    border: 1px solid #dcdcdc;
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    max-width: 560px;
}

.card-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

.card-form input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    background: #f8fafc;
}

.card-form input[type="file"]:focus {
    outline: none;
    border-color: #2f63d4;
    box-shadow: 0 0 0 3px rgba(47, 99, 212, 0.15);
    background: #fff;
}
</style>

{/block}
