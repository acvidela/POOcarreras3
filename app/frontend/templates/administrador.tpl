<!DOCTYPE html>
<html lang="es">
{include 'frontend/templates/head.tpl'}
<body>
  <div class="container">
    {include 'frontend/templates/header.tpl'}
    <section class="login-wrapper">
      <div class="login-card">
        <h2>Ingreso de Administrador</h2>

        {if $mensaje}
          <p class="login-error">{$mensaje}</p>
        {/if}

        <form method="POST" action="validarlogin" class="login-form">
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id="usuario" required>

          <label for="clave">Contrase&ntilde;a</label>
          <input type="password" name="clave" id="clave" required>

          <button type="submit">Iniciar sesi&oacute;n</button>
          <p class="back-home"><a href="home">Volver al inicio</a></p>
        </form>
      </div>
    </section>

    {include 'frontend/templates/footer.tpl'}
  </div>

  <style>
    .login-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .login-card {
      width: 100%;
      max-width: 420px;
      background: rgba(255, 255, 255, 0.9);
      border: 1px solid #ddd;
      border-radius: 14px;
      padding: 24px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      backdrop-filter: blur(4px);
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .login-card h2 {
      margin-top: 0;
      margin-bottom: 12px;
      text-align: center;
      font-size: 24px;
      font-weight: 700;
    }

    .login-error {
      margin: 0 0 12px 0;
      color: #b71c1c;
      font-weight: 600;
      text-align: center;
    }

    .login-form {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .login-form label {
      font-weight: 600;
      font-size: 14px;
    }

    .login-form input {
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .login-form input:focus {
      outline: 2px solid #888;
      border-color: #666;
    }

    .login-form button {
      margin-top: 6px;
      background-color: #333;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 700;
      transition: background-color 0.2s ease;
      font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    }

    .login-form button:hover {
      background-color: #555;
    }

    .back-home {
      text-align: center;
      margin: 8px 0 0 0;
    }

    .back-home a {
      color: #333;
      font-weight: 600;
      text-decoration: none;
    }

    .back-home a:hover {
      text-decoration: underline;
    }
  </style>
</body>
</html>
