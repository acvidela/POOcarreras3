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
                    <table class="table table-bordered table-hover">
                        <caption>Próximas Carreras</caption>
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

    {* Formulario emergente para inscripción *}
    <div class="overlay" id="overlay" onclick="hidePopup()"></div>
    <div class="popup" id="popup">
        <form method="POST" action="inscribirse">
            <h2>Formulario de Participación</h2>
            <input type="hidden" id="id_carrera" name="id_carrera" value="">

            <label for="name">Nombre y apellido:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="dob">Fecha de nacimiento:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="gender">Sexo:</label>
            <select id="gender" name="gender" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select><br><br>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required><br><br>

            <label for="mail">E-mail:</label>
            <input type="email" id="mail" name="mail" required><br><br>

            <button type="submit">Enviar</button>
            <button type="button" onclick="hidePopup()">Cerrar</button>
        </form>
    </div>

    {include 'frontend/templates/footer.tpl'}
</div>

<script>
function cargainicio() {
    window.location.href = 'home';
}

function showPopup(idCarrera) {
    document.getElementById('id_carrera').value = idCarrera;
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