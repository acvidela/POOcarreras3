{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}

<h2>Cargar resultados</h2>

<p>Completa los tiempos y posiciones para cada dorsal. Los cambios se guardan al enviar.</p>

<form method="POST" action="guardarResultados" class="card-form">
    <input type="hidden" name="carrera_id" value="{$carrera_id}">

    <table class="tabla-admin tabla-compacta">
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
                <td><input type="number" name="pos_general[]" min="1" placeholder="1"></td>
                <td><input type="text" name="categoria[]" placeholder="M30"></td>
                <td><input type="number" name="pos_categoria[]" min="1" placeholder="1"></td>

                <input type="hidden" name="inscripcion_id[]" value="{$i.id}">
            </tr>
        {/foreach}
    </table>

    <div class="form-actions">
        <button type="submit" class="btn">Guardar resultados</button>
    </div>
</form>

<style>
.card-form {
    background: white;
    border: 1px solid #dcdcdc;
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
}

.tabla-compacta th,
.tabla-compacta td {
    padding: 10px;
    vertical-align: middle;
}

.tabla-compacta input[type="text"],
.tabla-compacta input[type="number"] {
    width: 100%;
    box-sizing: border-box;
    padding: 8px 10px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    background: #f8fafc;
    transition: border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
}

.tabla-compacta input[type="text"]:focus,
.tabla-compacta input[type="number"]:focus {
    outline: none;
    border-color: #2f63d4;
    box-shadow: 0 0 0 3px rgba(47, 99, 212, 0.15);
    background: #fff;
}
</style>

{/block}
