<!DOCTYPE html>
<html lang="es">
{include 'frontend/templates/head.tpl'}
<body>
    <div class="container">
        {include 'frontend/templates/header.tpl'}
        <h2 style="text-align: center">Ingreso de Administrador</h2>

        {if $mensaje}
            <p style="color: red;">{$mensaje}</p>
        {/if}

        <div class="centrar">
        <div class="admin">
        <form method="POST" action="validarlogin" style="max-width: 400px; margin: auto;">
            <label for="usuario">Usuario:</label><br>
            <input type="text" name="usuario" id="usuario" required><br><br>

            <label for="clave">Contraseña:</label><br>
            <input type="password" name="clave" id="clave" required><br><br>

            <button type="submit">Iniciar sesión</button>
        <p style="text-align: center;"><a href="home">Volver al inicio</a></p>

        </form>
        </div>
        </div>


        {include 'frontend/templates/footer.tpl'}
    </div>
</body>
</html>
