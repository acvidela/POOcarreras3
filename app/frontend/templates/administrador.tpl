<!DOCTYPE html>
<html lang="es">

{include 'templates/head.tpl'}

<body>
    <div class="container">
        {include 'templates/header.tpl'}

        <nav>
            <a href="index.php">Inicio</a>
            <div class="column">
                <a class="accordion">Carreras</a>
                <div class="panel">
                    <a href="#" onclick="showForm()">Agregar una Carrera</a>
                    <a href="#" onclick="showForm()">Editar una Carrera</a>
                    <a href="#" onclick="showForm()">Eliminar una Carrera</a>
                </div>
            </div>
            <div class="column">
                <a class="accordion">Participantes</a>
                <div class="panel">
                    <a href="#" onclick="showForm()">Agregar una Participante</a>
                    <a href="#" onclick="showForm()">Editar una Participante</a>
                    <a href="#" onclick="showForm()">Eliminar una Participante</a>
                </div>
            </div>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <div id="form-container">
                <p></p>
            </div>
        </div>
        {include 'templates/footer.tpl'}
    </div>

    <script>
        function cargainicio() {
            window.location.href = 'index.php';
        }

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        function showForm() {
            const formContainer = document.getElementById('form-container');
            formContainer.innerHTML = `
                   <form>
                    <label for="name">opcion1:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="name">opcion2:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="name">opcion3:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="opcion4">Email:</label>
                    <input type="email" id="email" name="email"><br><br>
                    <input type="submit" value="Enviar">
                </form>
            `;
        }
    </script>
    <style>
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
    </style>
</body>
</html>
