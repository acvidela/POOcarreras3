<!DOCTYPE html>
<html lang="es">

{include 'frontend/templates/head.tpl'}

<body>
    <div class="container">
        {include 'frontend/templates/header.tpl'}
        {include 'frontend/templates/navbarIndex.tpl'}

        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Bienvenido a Es-Tan-Dil</h2>
            <p>Somos un grupo apasionado por el Atletismo y la naturaleza, dedicados a organizar carreras inolvidables en las hermosas sierras de Tandil. Nuestro objetivo es fomentar un estilo de vida saludable y conectar a las personas con la naturaleza de nuestra ciudad a través del deporte.</p>

            <h2>Estos son los lugares por donde podés llegar a pasar</h2>
            <section class="galeria">
                <img src="https://as1.ftcdn.net/v2/jpg/03/90/19/48/1000_F_390194899_CEDg71PI6Uxb0UaoLkZNrO8zNx8lX0hZ.jpg" alt="Paisaje 1" />
                <img src="https://photo620x400.mnstatic.com/def2c358c3ad724c60622558ba514f64/tandil.jpg" alt="Paisaje 2" />
                <img src="https://as1.ftcdn.net/jpg/04/32/05/48/1000_F_432054803_vvVpwJLGs2UlEBpSPqNrJ1SwFjnaILG3.jpg" alt="Paisaje 3" />
                <img src="https://as1.ftcdn.net/v2/jpg/07/70/83/86/1000_F_770838641_ml0Pgj3q8DirP8dWgIq11HmLgpZRRntp.jpg" alt="Paisaje 4" />
            </section>

            <h2>¿Y vos, te lo vas a perder?</h2>
        </div>

        {include 'frontend/templates/footer.tpl'}
    </div>

    <script>
        function cargainicio() {
            window.location.href = 'index.php';
        }

        function iniciodesesion() {
            const username = prompt('Ingrese su nombre de usuario:');
            const password = prompt('Ingrese su contraseña:');
            if ($adminValido) {
                alert('Bienvenido, ' + username + '!');
            } else {
                alert('Inicio de sesión cancelado.');
            }
        }
    </script>
</body>

</html>

<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .main-content {
        flex: 1;
    }

    button {
        background-color: Darkgrey;
        border-radius: 12px;
        border: 2px solid Black;
        color: Black;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        transition: background-color 0.3s;
    }


    h2 {
        font-family: 'txt', sans-serif;
        width: 100%;
        text-align: center;
        margin-bottom: 5%;
        font-size: 40px;
    }

    p{
        font-size: 20px;
    }
    .galeria {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin: 20px;
    }

    .galeria img {
        width: 48%;
        height: auto;
        border: 2px solid #ccc;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>

