{extends file="backend/views/admin/layout_base_admin.tpl"}

{block name="contenido_admin"}
<h2>Editar inscripcion</h2>

<form action="index.php?action=actualizarInscripcion" method="post" class="form-admin">
    <input type="hidden" name="id" value="{$inscripcion.id}">

    <h3>Datos del atleta</h3>
    <label>Nombre</label>
    <input type="text" name="nombre" value="{$inscripcion.atleta_nombre}" required>

    <label>Apellido</label>
    <input type="text" name="apellido" value="{$inscripcion.atleta_apellido}" required>

    <label>DNI</label>
    <input type="text" name="dni" value="{$inscripcion.atleta_dni}" required>

    <label>Email</label>
    <input type="email" name="email" value="{$inscripcion.atleta_email}" required>

    <label>Telefono</label>
    <input type="text" name="telefono" value="{$inscripcion.atleta_telefono}">

    <label>Genero</label>
    <select name="genero" required>
        <option value="M" {if $inscripcion.atleta_genero == 'M'}selected{/if}>Masculino</option>
        <option value="F" {if $inscripcion.atleta_genero == 'F'}selected{/if}>Femenino</option>
        <option value="X" {if $inscripcion.atleta_genero == 'X'}selected{/if}>Otro / Prefiero no decir</option>
    </select>

    <label>Fecha de nacimiento</label>
    <input type="date" name="fechadenacimiento" value="{$inscripcion.atleta_fechadenacimiento|substr:0:10}">

    <h3>Estado de la inscripcion</h3>
    <label>Estado</label>
    <select name="estado">
        <option value="pendiente" {if $inscripcion.estado == 'pendiente'}selected{/if}>Pendiente</option>
        <option value="pagado" {if $inscripcion.estado == 'pagado'}selected{/if}>Pagado</option>
        <option value="inscripto" {if $inscripcion.estado == 'inscripto'}selected{/if}>Inscripto</option>
    </select>

    <div class="form-actions">
        <button type="submit">Guardar cambios</button>
        <a class="btn" href="index.php?action=inscripcionesTodas">Cancelar</a>
    </div>
</form>
{/block}
