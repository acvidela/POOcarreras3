<!DOCTYPE html>
<html lang="es">
{include 'frontend/templates/head.tpl'}
<body>
  <div class="container">
    {include 'frontend/templates/header.tpl'}
    {include 'frontend/templates/navbarIndex.tpl'}

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover tabla-proximas">
              <caption>Proximas Carreras</caption>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Circuito</th>
                  <th>Fecha</th>
                  <th>Inscripciones</th>
                </tr>
              </thead>
              <tbody>
                {foreach from=$carreras item=carrera}
                  <tr>
                    <td>{$carrera->nombre}</td>
                    <td>{$carrera->circuito}</td>
                    <td>{$carrera->fecha}</td>
                    <td>
                      <button type="button" onclick="showPopup({$carrera->id})">Quiero participar</button>
                    </td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {* Formulario emergente para inscripcion *}
    <div class="overlay" id="overlay" onclick="hidePopup()"></div>

    <div class="popup" id="popup">
      <form method="POST" action="index.php?action=guardarPreinscripcion">
        {include 'frontend/templates/form_preinscripcion.tpl'}
      </form>
    </div>

     {include 'frontend/templates/footer.tpl'}
  </div>

  <script>
    function cargainicio() {
      window.location.href = 'home';
    }

  function showPopup(idCarrera) {
    document.getElementById('carrera_id').value = idCarrera;
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
  }

    function hidePopup() {
      document.getElementById('popup').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
    }
  </script>

  <style>
    button {
      background-color: Darkgrey;
      border-radius: 12px;
      border: 2px solid Black;
      color: Black;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: White;
    }

    .tabla-proximas th,
    .tabla-proximas td {
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
      font-size: 16px;
      font-weight: 600;
    }

    .popup {
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 1001;
    }

    .overlay {
      display: none;
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }
  </style>
</body>
</html>
