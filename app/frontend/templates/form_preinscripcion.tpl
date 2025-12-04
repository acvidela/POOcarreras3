<div class="pre-card">
  <h2>Formulario de Preinscripcion</h2>

  <input type="hidden" name="carrera_id" id="carrera_id" value="{$carrera_id|default:''}">

  <div class="pre-grid">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" required>

    <label for="dni">DNI</label>
    <input type="text" id="dni" name="dni" required inputmode="numeric" pattern="[0-9]+" title="Solo numeros" maxlength="12">

    <label for="fechadenacimiento">Fecha de nacimiento</label>
    <input type="date" id="fechadenacimiento" name="fechadenacimiento" required>

    <label for="genero">Genero</label>
    <select id="genero" name="genero" required>
        <option value="">Seleccionar...</option>
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
    </select>

    <label for="telefono">Telefono</label>
    <input type="text" id="telefono" name="telefono" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
  </div>

  <div class="pre-actions">
    <button type="submit" class="btn">Enviar preinscripcion</button>
    <button type="button" class="btn" onclick="hidePopup()">Cancelar</button>
  </div>
</div>

<style>
.pre-card {
  background: white;
  border: 1px solid #dcdcdc;
  border-radius: 12px;
  padding: 16px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
}

.pre-card h2 {
  margin-top: 0;
  margin-bottom: 12px;
  font-size: 20px;
}

.pre-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 10px;
}

.pre-grid label {
  font-weight: 600;
}

.pre-grid input,
.pre-grid select {
  width: 100%;
  box-sizing: border-box;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #cbd5e1;
  background: #f8fafc;
  transition: border-color 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
}

.pre-grid input:focus,
.pre-grid select:focus {
  outline: none;
  border-color: #2f63d4;
  box-shadow: 0 0 0 3px rgba(47, 99, 212, 0.15);
  background: #fff;
}

.pre-actions {
  display: flex;
  gap: 8px;
  justify-content: flex-end;
  margin-top: 12px;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: linear-gradient(180deg, #2f63d4 0%, #1f4ba3 100%);
  color: white;
  padding: 6px 12px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  font-size: 14px;
  font-family: inherit;
  border: 1px solid #1f4ba3;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
  transition: transform 0.08s ease, box-shadow 0.18s ease, background 0.2s ease;
  cursor: pointer;
}

.btn:hover {
  background: linear-gradient(180deg, #3f75e3 0%, #2454b0 100%);
  box-shadow: 0 5px 12px rgba(0, 0, 0, 0.16);
  transform: translateY(-1px);
}

.btn:active {
  transform: translateY(0);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
}
</style>
