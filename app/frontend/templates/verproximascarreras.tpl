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
      <form id="preinscripcion-form" method="POST" action="index.php?action=guardarPreinscripcion">
        {include 'frontend/templates/form_preinscripcion.tpl'}
      </form>
    </div>

  <div class="popup" id="popup-success">
      <h2>Preinscripcion enviada</h2>
      <p class="lead">Tu pre-inscripcion fue realizada con exito. Para completarla deberas realizar el pago y presentar el comprobante de forma presencial o enviarlo a nuestro mail.</p>
      <p>Estado actual: <strong id="pre-estado">pendiente</strong></p>
      <a id="link-cupon" class="btn btn-primary" href="#">Ver / Descargar cupon de pago</a>
      <div class="popup-actions">
        <button type="button" onclick="closeSuccess()">Cerrar</button>
      </div>
    </div>

    <div class="popup" id="popup-error">
      <h2>No pudimos completar la pre-inscripcion</h2>
      <p class="lead">Hubo un inconveniente y la solicitud no se guardo.</p>
      <p class="reason"><strong>Motivo:</strong> <span id="popup-error-message">Intentalo nuevamente en unos segundos.</span></p>
      <div class="popup-actions">
        <button type="button" onclick="closeError()">Entendido</button>
      </div>
    </div>

     {include 'frontend/templates/footer.tpl'}
  </div>

  <script>
    function cargainicio() {
      window.location.href = 'home';
    }

  const overlay = document.getElementById('overlay');
  const popup = document.getElementById('popup');
  const successPopup = document.getElementById('popup-success');
  const errorPopup = document.getElementById('popup-error');
  const form = document.getElementById('preinscripcion-form');
  const estadoLabel = document.getElementById('pre-estado');
  const cuponLink = document.getElementById('link-cupon');
  const errorMessage = document.getElementById('popup-error-message');

  function showPopup(idCarrera) {
    document.getElementById('carrera_id').value = idCarrera;
    popup.style.display = 'block';
    overlay.style.display = 'block';
  }

  function hidePopup() {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    }

  function showSuccess(preId, estado) {
    estadoLabel.textContent = estado || 'pendiente';
    cuponLink.href = 'index.php?action=cuponPago&id=' + preId;
    successPopup.style.display = 'block';
    overlay.style.display = 'block';
  }

  function closeSuccess() {
    successPopup.style.display = 'none';
    overlay.style.display = 'none';
  }

  function formatErrorMessage(rawMessage) {
    if (!rawMessage) {
      return 'Hubo un problema al procesar la pre-inscripcion. Intenta nuevamente.';
    }

    if (typeof rawMessage === 'object') {
      return rawMessage.message || rawMessage.error || 'Hubo un problema al procesar la pre-inscripcion.';
    }

    try {
      const parsed = JSON.parse(rawMessage);
      if (parsed && parsed.message) return parsed.message;
    } catch (e) {
      /* si no es JSON, seguimos con el texto plano */
    }

    const text = String(rawMessage);
    const match = text.match(/message["']?\s*[:=]\s*["']?([^"'}]+)/i);
    if (match && match[1]) {
      return match[1];
    }

    if (text.includes('success') || text.includes('{') || text.includes('}')) {
      return 'No pudimos completar la pre-inscripcion. Intenta nuevamente.';
    }

    return text;
  }

  function showError(message) {
    errorMessage.textContent = formatErrorMessage(message);
    errorPopup.style.display = 'block';
    overlay.style.display = 'block';
  }

  function closeError() {
    errorPopup.style.display = 'none';
    overlay.style.display = 'none';
  }

  overlay.addEventListener('click', () => {
    hidePopup();
    closeSuccess();
    closeError();
  });

  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(form);

    try {
      const response = await fetch('index.php?action=guardarPreinscripcion', {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });

      const raw = await response.text();
      let data = null;

      try {
        data = raw ? JSON.parse(raw) : null;
      } catch (parseError) {
        // si viene HTML o texto plano pero la respuesta es 200, lo tomamos como exito
        if (!response.ok) throw parseError;
      }

      const success = response.ok && (data === null || data.success !== false);
      if (!success) {
        throw new Error(data?.message || raw || 'No se pudo completar la preinscripcion');
      }

      form.reset();
      hidePopup();
      const preId = data?.preinscripcion_id || data?.id || null;
      showSuccess(preId, data?.estado || 'pendiente');
    } catch (error) {
      showError(error.message || error);
    }
  });
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
      font-size: 16px;
      font-weight: 600;
    }

    .popup {
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background: linear-gradient(180deg, #ffffff 0%, #f5f8ff 100%);
      padding: 24px 26px;
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.18);
      z-index: 1001;
      border-radius: 16px;
      max-width: 480px;
      width: 90%;
    }

    .overlay {
      display: none;
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(5, 10, 25, 0.55);
      z-index: 1000;
      backdrop-filter: blur(2px);
    }

    #popup-success {
      text-align: left;
    }

    .popup-actions {
      margin-top: 12px;
      display: flex;
      justify-content: center;
      gap: 8px;
    }

    .popup h2 {
      margin-top: 0;
      margin-bottom: 8px;
      font-size: 22px;
      color: #0f1c3d;
    }

    .popup p {
      margin: 0 0 12px 0;
      color: #1f2a4d;
      line-height: 1.45;
    }

    .popup .lead {
      font-size: 16px;
      font-weight: 600;
    }

    .popup a.btn {
      margin-top: 6px;
    }

    #popup-error h2 {
      color: #9a1b1b;
    }

    #popup-error p {
      color: #3a2323;
    }

    #popup-error .reason {
      background: #fff4f4;
      border-radius: 10px;
      padding: 10px 12px;
      border: 1px solid #f0c6c6;
    }
  </style>
</body>
</html>
