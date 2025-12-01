<!DOCTYPE html>
<html lang="es">
{include 'frontend/templates/head.tpl'}

<body>
<div class="admin-layout">

  <!-- ================= SIDEBAR ================= -->
  <aside class="sidebar">
      <h2 class="sidebar-title">Panel Admin</h2>

      <ul class="menu">
          <li><a href="admin">🏠 Dashboard</a></li>

          <li class="menu-section">Carreras</li>
          <li><a href="carrerasFuturas">📅 Próximas</a></li>
          <li><a href="carrerasTerminadas">🏁 Finalizadas</a></li>
          <li><a href="javascript:void(0)" onclick="toggleCrearCarrera()">➕ Crear carrera</a></li>

          <li class="menu-section">Incripciones</li>
          <li><a href="inscripcionesTodas">📋 Todas</a></li>
          <li><a href="inscripcionesConfirmadas">✅ Confirmadas</a></li>
          <li><a href="inscripcionesPendientes">⏳ Pendientes de pago</a></li>
          <li><a href="inscripcionesPagadas">💵 Pagadas</a></li>

          <li class="menu-section">Cuenta</li>
          <li><a href="logout">🚪 Cerrar sesión</a></li>
      </ul>
  </aside>


  <!-- ================= CONTENIDO PRINCIPAL ================= -->
<main class="content">

    <header class="top-bar">
        <h1>Bienvenido, {$usuario}</h1>
    </header>

    {if $flash}
        <section class="flash-msg">{$flash}</section>
    {/if}

    {block name="contenido_admin"}{/block}

</main>
</div>


<!-- ================= SCRIPTS ================= -->
<script>
function toggleCrearCarrera(id = null) {
    const cont = document.getElementById('form-carrera-container');

    cont.innerHTML = `
      <form method="POST" action="crearCarrera" class="form-admin">
          <h3>${id ? "Editar carrera" : "Nueva carrera"}</h3>

          <input type="hidden" name="id" value="${id || ''}">

          <label>Nombre</label>
          <input type="text" name="nombre" required>

          <label>Circuito</label>
          <input type="text" name="circuito" required>

          <label>Fecha</label>
          <input type="date" name="fecha" required>

          <label>Precio</label>
          <input type="number" name="precio" min="0" step="0.01" required>

          <div class="form-actions">
              <button type="submit">${id ? "Guardar cambios" : "Crear"}</button>
              <button type="button" onclick="document.getElementById('form-carrera-container').innerHTML=''">Cancelar</button>
          </div>
      </form>
    `;
}
</script>


<!-- ================= ESTILOS ================= -->
<style>

body {
    margin: 0;
    font-family: "Segoe UI", Arial, sans-serif;
}

.admin-layout {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 230px;
    background: #1d1f21;
    color: white;
    padding: 20px;
    box-sizing: border-box;
}

.sidebar-title {
    margin: 0 0 20px;
    font-size: 22px;
    font-weight: 700;
}

.menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-section {
    margin-top: 20px;
    font-size: 14px;
    text-transform: uppercase;
    opacity: 0.6;
}

.menu a {
    display: block;
    padding: 10px 0;
    color: white;
    text-decoration: none;
    font-size: 16px;
}

.menu a:hover {
    color: #ffd65b;
}


.content {
    flex: 1;
    padding: 30px;
    background: #f5f5f5;
}

.top-bar h1 {
    margin: 0 0 25px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 20px;
}

.stat-box {
    background: white;
    padding: 18px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.stat-label {
    margin: 0;
    color: #666;
}

.stat-value {
    margin-top: 5px;
    font-size: 28px;
    font-weight: 700;
}

.flash-msg {
    background: #d6f5d6;
    color: #1a7a1a;
    padding: 12px;
    border-radius: 8px;
    margin: 10px 0;
}

.alerts ul {
    margin: 0;
    padding-left: 20px;
}

.recent table {
    width: 100%;
    border-collapse: collapse;
}

.tabla-admin th,
.tabla-admin td {
    padding: 10px;
    border: 1px solid #ccc;
}

.tabla-admin th {
    background: #eee;
}

.form-admin {
    margin-top: 25px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #ddd;
    max-width: 420px;
}

.form-admin input {
    padding: 10px;
    border: 1px solid #aaa;
    border-radius: 6px;
}

.form-actions {
    margin-top: 10px;
    display: flex;
    gap: 10px;
}

</style>

</body>
</html>
