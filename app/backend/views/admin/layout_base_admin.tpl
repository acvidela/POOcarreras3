<!DOCTYPE html>
<html lang="es">
{include 'frontend/templates/head.tpl'}

<body>
<div class="admin-layout">

  <!-- ================= SIDEBAR ================= -->
  <aside class="sidebar">
      <div class="sidebar-logo">
          <img src="frontend/images/logo.png" alt="Logo" />
      </div>
      <h2 class="sidebar-title">Panel Admin</h2>

      <ul class="menu">
          <li><a href="admin">🏠 Dashboard</a></li>

          <li class="menu-section">Carreras</li>
          <li><a href="carrerasFuturas">📅 Próximas</a></li>
          <li><a href="carrerasTerminadas">🏁 Finalizadas</a></li>
          <li><a href="crearCarrera"> ➕ Crear carrera</a></li>

          <li class="menu-section">Incripciones</li>
          <li><a href="inscripcionesTodas">📋 Todas</a></li>
          <li><a href="inscripcionesConfirmadas">✅ Confirmadas</a></li>
          <li><a href="inscripcionesPagadas">💵 Pagadas</a></li>
          <li><a href="inscripcionesPendientes">⏳ Pendientes de pago</a></li>

          <li class="menu-section">Cuenta</li>
          <li><a href="logout">🚪 Cerrar sesión</a></li>
      </ul>
      <h3>Administrador {$usuario}</h3>
  </aside>


  <!-- ================= CONTENIDO PRINCIPAL ================= -->
<main class="content">

    <header class="top-bar">
        <h1>Es-Tan-Dil</h1>
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
    font-family: initial;
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

.sidebar-logo {
    text-align: center;
    margin-bottom: 12px;
}

.sidebar-logo img {
    max-width: 120px;
    width: 100%;
    height: auto;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.35));
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
    font-family: inherit;
}

.menu a:hover {
    color: #ffd65b;
}


.content {
    flex: 1;
    padding: 30px;
    background: #f5f5f5;
    font-family: inherit;
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
    font-family: inherit;
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

.btn-danger {
    background: linear-gradient(180deg, #d93939 0%, #b02121 100%);
    border-color: #a51919;
}

.btn-danger:hover {
    background: linear-gradient(180deg, #e14c4c 0%, #c12b2b 100%);
}

.btn + .btn {
    margin-left: 6px;
}

.action-buttons {
    display: inline-flex;
    gap: 8px;
    flex-wrap: wrap;
    align-items: center;
}

.tabla-admin td.action-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: nowrap;
    white-space: nowrap;
    min-width: 160px;
}

</style>

</body>
</html>
