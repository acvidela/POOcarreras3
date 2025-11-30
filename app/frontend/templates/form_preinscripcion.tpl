<h2>Formulario de Preinscripción</h2>

<input type="hidden" name="carrera_id" id="carrera_id" value="{$carrera_id|default:''}">

<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" required>

<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" required>

<label for="dni">DNI:</label>
<input type="text" id="dni" name="dni" required>

<label for="fechadenacimiento">Fecha de nacimiento:</label>
<input type="date" id="fechadenacimiento" name="fechadenacimiento" required>

<label for="genero">Género:</label>
<select id="genero" name="genero" required>
    <option value="">Seleccionar...</option>
    <option value="F">Femenino</option>
    <option value="M">Masculino</option>
</select>

<label for="telefono">Teléfono:</label>
<input type="text" id="telefono" name="telefono" required>

<label for="email">Email:</label>
<input type="email" id="email" name="email" required>

<button type="submit">Enviar preinscripción</button>
<button type="button" onclick="hidePopup()">Cancelar</button>
