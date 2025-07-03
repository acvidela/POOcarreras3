        <nav>
            <a href="home">Inicio</a>
            <a href="verresultadoscarreras">Resultados de Carreras</a>
            <a href="verproximascarreras">Ver Próximas Carreras</a>
            {if $logueado}
                <a href="admin">Panel</a>
                <a href="logout">Cerrar sesión ({$usuario})</a>
            {else}
                <a href="login">Administrador</a>
            {/if}
        </nav>

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


