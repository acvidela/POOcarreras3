<!DOCTYPE html>
<html lang="es">

{include 'templates/head.tpl'}

<body>
    <div class="container">
        {include 'templates/header.tpl'}

        <nav>
            <a href="index.php">Inicio</a>
            <div class:"column">
            <a class="accordion">Carreras</a>
            <div class="panel">
                <a href="carrera1.php">Agregar una Carrera</a>
                <a href="carrera2.php">Editar una Carrera</a>
                <a href="carrera3.php">Eliminar una Carrera</a>
            </div>
            </div>
            <div class:"column">
            <a class="accordion">Participantes</a>
            <div class="panel">
                <a href="carrera1.php">Agregar una Partipante</a>
                <a href="carrera2.php">Editar una Participante</a>
                <a href="carrera3.php">Eliminar una Participante</a>
            </div>
            </div>
        </nav>
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>administrador</h2>
            <p></p>
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

        column.{
            display:flex;
            flex-direction: column;
        }
    </style>
</body>
</html>