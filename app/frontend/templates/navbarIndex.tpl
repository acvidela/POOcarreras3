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
  width: 100%;
  text-align: center;
  margin-bottom: 5%;
}

.galeria {
  display: flex;
  flex-wrap: wrap;
  gap: 10px; /* Espacio entre las imagenes */
  justify-content: center; /* Centrar las imagenes horizontalmente */
  margin: 20px;
}

.galeria img {
  width: 48%;
  height: auto;
  border: 2px solid #ccc;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}
</style>
