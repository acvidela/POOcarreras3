<!DOCTYPE html>
<html lang="es">

{include 'frontend/templates/head.tpl'}

<body>
    <div class="container">
        {include 'frontend/templates/header.tpl'}

        {include 'frontend/templates/navbarIndex.tpl'}
        
        <div class="main-content">
            <!-- Contenido principal de la página -->
            <h2>Bienvenido a Es-Tan-Dil</h2
            <p>Somos un grupo apasionado por el Atletismo y la naturaleza, dedicados a organizar carreras inolvidables en las hermosas sierras de Tandil, Nuestros objetivo es fomentar un estilo de vida saludable y conectar a las personas la naturaleza de nuestra ciudad a traves del deporte</p>
            <h2>Estos son los lugares por donde podés llegar a pasar</h2>
            <section class="galeria">
            <img src="https://as1.ftcdn.net/v2/jpg/03/90/19/48/1000_F_390194899_CEDg71PI6Uxb0UaoLkZNrO8zNx8lX0hZ.jpg"</img>
            <img src="https://photo620x400.mnstatic.com/def2c358c3ad724c60622558ba514f64/tandil.jpg"</img>
            <img src="https://as1.ftcdn.net/jpg/04/32/05/48/1000_F_432054803_vvVpwJLGs2UlEBpSPqNrJ1SwFjnaILG3.jpg"</img>
            <img src="https://as1.ftcdn.net/v2/jpg/07/70/83/86/1000_F_770838641_ml0Pgj3q8DirP8dWgIq11HmLgpZRRntp.jpg"</img>
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

button {
  background-color: Darkgrey;
  border-radius: 12px;  /* Mantén uno de los border-radius */
  border: 2px solid Black;
  color: Black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transition: background-color 0.3s 
}

@font-face {
    font-family: 'Rubikmaps';
    src: url('../styles/fonts/Rubikmaps-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

h2 {
    font-family: 'Rubikmaps', sans-serif;
    width: 100%;
    text-align: center;
    margin-bottom: 5%;
}
.galeria {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Espacio entre las imágenes */
    justify-content: center; /* Centrar las imágenes horizontalmente */
    margin: 20px;
}

.galeria img {
    width: 48%; /* Ajusta el ancho de las imágenes */
    height: auto; /* Mantén la proporción de las imágenes */
    border: 2px solid #ccc; /* Opcional: añade un borde a las imágenes */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Opcional: añade una sombra a las imágenes */
}
</style>


