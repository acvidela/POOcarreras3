<!DOCTYPE html>
<html lang="es">
{include 'frontend/templates/head.tpl'}
<body>
  <div class="container">
    {include 'frontend/templates/header.tpl'}

    <nav>
      <a href="index.php">Inicio</a>
      <div class="column">
        <a class="accordion">Carreras</a>
        <div class="panel">
          <a href="#" onclick="showFormCarrera(); return false;">Agregar una Carrera</a>
          <a href="#" onclick="showForm()">Editar una Carrera</a>
          <a href="#" onclick="showForm()">Eliminar una Carrera</a>
        </div>
      </div>
      <div class="column">
        <a class="accordion">Participantes</a>
        <div class="panel">
          <a href="#" onclick="showForm()">Agregar un Participante</a>
          <a href="#" onclick="showForm()">Editar un Participante</a>
          <a href="#" onclick="showForm()">Eliminar un Participante</a>
        </div>
      </div>
    </nav>

    <div class="main-content">
      <section class="dashboard-grid">
        <div class="card stat">
          <p class="label">Carreras totales</p>
          <p class="value">{$stats.total_carreras|default:0}</p>
        </div>
        <div class="card stat">
          <p class="label">Próximas</p>
          <p class="value">{$stats.proximas|default:0}</p>
        </div>
        <div class="card stat">
          <p class="label">Con resultados</p>
          <p class="value">{$stats.anteriores|default:0}</p>
        </div>
        <div class="card stat">
          <p class="label">Participantes</p>
          <p class="value">{$stats.participantes|default:0}</p>
        </div>
      </section>

      <section class="quick-actions">
        <h2>Acciones rápidas</h2>
        <div class="actions">
          <button type="button" onclick="showFormCarrera()">Crear carrera</button>
          <button type="button" onclick="window.location.href='verproximascarreras'">Ver próximas</button>
          <button type="button" onclick="window.location.href='verresultadoscarreras'">Ver resultados</button>
          <button type="button" onclick="showForm()">Gestionar inscriptos</button>
        </div>
      </section>

      {if $flash}
        <section class="flash">
          <p>{$flash}</p>
        </section>
      {/if}

      <section class="alerts">
        <h2>Alertas</h2>
        {if $alertas|@count > 0}
          <ul>
            {foreach from=$alertas item=alerta}
              <li>{$alerta}</li>
            {/foreach}
          </ul>
        {else}
          <p>No hay alertas por ahora.</p>
        {/if}
      </section>

      <section class="recent">
        <h2>Últimas carreras</h2>
        {if $carrerasRecientes|@count > 0}
          <table class="tabla-admin">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Circuito</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              {foreach from=$carrerasRecientes item=carrera}
                <tr>
                  <td>{$carrera->nombre}</td>
                  <td>{$carrera->circuito}</td>
                  <td>{$carrera->fecha}</td>
                  <td>
                    <button type="button" onclick="showForm()">Editar</button>
                    <button type="button" onclick="window.location.href='resultadoCarrera?id={$carrera->id}'">Ver resultados</button>
                  </td>
                </tr>
              {/foreach}
            </tbody>
          </table>
        {else}
          <p>Todavía no hay carreras cargadas.</p>
        {/if}
      </section>

      <div id="form-container"></div>
    </div>

    {include 'frontend/templates/footer.tpl'}
  </div>

    <script>
    function cargainicio() {
      window.location.href = 'index.php';
    }

    const acc = document.getElementsByClassName('accordion');
    for (let i = 0; i < acc.length; i++) {
      acc[i].addEventListener('click', function () {
        this.classList.toggle('active');
        const panel = this.nextElementSibling;
        panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
      });
    }

    function showForm() {
      const formContainer = document.getElementById('form-container');
      if (!formContainer) return;
      formContainer.innerHTML = `
        <form class="form-admin" onsubmit="return false;">
          <h3>Gestionar inscriptos</h3>
          <label for="insc-nombre">Nombre</label>
          <input type="text" id="insc-nombre" name="nombre" required>

          <label for="insc-apellido">Apellido</label>
          <input type="text" id="insc-apellido" name="apellido" required>

          <label for="insc-dni">DNI</label>
          <input type="text" id="insc-dni" name="dni" required>

          <label for="insc-email">Email</label>
          <input type="email" id="insc-email" name="email" required>

          <label for="insc-carrera">ID Carrera</label>
          <input type="number" id="insc-carrera" name="id_carrera" min="1" required>

          <label for="insc-categoria">Categoria</label>
          <input type="text" id="insc-categoria" name="categoria">

          <div class="form-actions">
            <button type="submit">Guardar</button>
            <button type="button" onclick="clearFormContainer()">Cancelar</button>
          </div>
        </form>
      `;
    }

    function showFormCarrera() {
      const formContainer = document.getElementById('form-container');
      if (!formContainer) return;
      formContainer.innerHTML = `
        <form method="POST" action="crearCarrera" class="form-admin">
          <h3>Nueva carrera</h3>
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" required>

          <label for="circuito">Circuito</label>
          <input type="text" id="circuito" name="circuito" required>

          <label for="fecha">Fecha</label>
          <input type="date" id="fecha" name="fecha" required>

          <label for="precio">Precio</label>
          <input type="number" id="precio" name="precio" min="0" step="0.01" required>

          <div class="form-actions">
            <button type="submit">Guardar</button>
            <button type="button" onclick="clearFormContainer()">Cancelar</button>
          </div>
        </form>
      `;
    }

    function clearFormContainer() {
      const formContainer = document.getElementById('form-container');
      if (formContainer) {
        formContainer.innerHTML = '';
      }
    }
  </script>

  <style>
    .main-content {
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .accordion {
      cursor: pointer;
    }

    .panel {
      padding: 0 18px;
      display: none;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
      background-color: grey;
      border-radius: 15px;
    }

    .panel a {
      display: block;
      padding: 10px 0;
    }

    .panel a:hover {
      background-color: grey;
    }

    .column {
      display: flex;
      flex-direction: column;
    }

    #form-container {
      margin-top: 20px;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 12px;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .card {
      background: #f4f4f4;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 12px 14px;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .card.stat .label {
      margin: 0;
      font-size: 14px;
      color: #555;
    }

    .card.stat .value {
      margin: 4px 0 0 0;
      font-size: 28px;
      font-weight: 700;
      color: #222;
    }

    .quick-actions h2,
    .alerts h2,
    .recent h2 {
      margin: 0 0 8px 0;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .actions button {
      background-color: #333;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s ease;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
      font-size: 16px;
      font-weight: 600;
    }

    .actions button:hover {
      background-color: #555;
    }

    .alerts ul {
      margin: 0;
      padding-left: 18px;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .alerts li {
      color: #b34700;
      margin-bottom: 4px;
    }

    .alerts p {
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
      font-size: 16px;
      font-weight: 600;
    }

    .tabla-admin {
      width: 100%;
      border-collapse: collapse;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .tabla-admin th,
    .tabla-admin td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
      font-size: 16px;
      font-weight: 600;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
      font-style: normal;
    }

    .tabla-admin th {
      background: #eee;
    }

    .tabla-admin button {
      margin-right: 6px;
      padding: 6px 10px;
      border-radius: 6px;
      border: 1px solid #888;
      background: #f4f4f4;
      cursor: pointer;
    }

    .tabla-admin button:hover {
      background: #e0e0e0;
    }

    .flash {
      padding: 10px 12px;
      border-radius: 8px;
      background: #e8f5e9;
      border: 1px solid #b6e0b8;
      color: #2e7d32;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .form-admin {
      display: flex;
      flex-direction: column;
      gap: 10px;
      background: #f8f8f8;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 16px;
      max-width: 420px;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .form-admin h3 {
      margin: 0 0 6px 0;
      font-size: 18px;
      font-weight: 700;
    }

    .form-admin label {
      font-weight: 600;
      font-size: 14px;
    }

    .form-admin input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .form-admin .form-actions {
      display: flex;
      gap: 8px;
      margin-top: 6px;
    }

    .form-admin button[type="submit"] {
      background-color: #333;
      color: white;
      border: none;
      padding: 10px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 700;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .form-admin button[type="button"] {
      background-color: #f1f1f1;
      color: #333;
      border: 1px solid #ccc;
      padding: 10px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .form-admin button:hover {
      opacity: 0.9;
    }
  </style>
</body>
</html>





