<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
/* Estilos para el cuerpo de la página */
body {
  background-color: #40E0D0;/* Azul turquesa */
}

/* Estilos para el menú desplegable en pantallas pequeñas */
@media (max-width: 767px) {
  .navbar .dropdown-menu .dropdown-item {
    padding: .5rem 1rem;
  }
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 40px;"> <!-- Modificar la altura mínima -->
  <div class="container">
    <a class="navbar-brand" href="#">Alcaldía Municipal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Alcaldia Municipal
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Mision y Visión</a>
              <a class="dropdown-item" href="#">Ley De Municipalidad</a>
              <a class="dropdown-item" href="#">Documentos De Interes</a>
            </div>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Atencion Ciudadano
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Bienes Inmuebles</a>
            <a class="dropdown-item" href="#">Cambio de RTN</a>
            <a class="dropdown-item" href="#">Matrimonio Civil</a>
            <a class="dropdown-item" href="#">Solvencia Municipal</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Gerencia Catastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Limites y Colindancias</a>
            <a class="dropdown-item" href="#">INA</a>
            <a class="dropdown-item" href="#">Declaracion Descuento Tercera Edad</a>
            <a class="dropdown-item" href="#">Ubicacion De Clave Catastral</a>
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Noticias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Comunicados</a>
              <a class="dropdown-item" href="#">Notas De Prensa</a>
              <a class="dropdown-item" href="#">Calendario-Cabildos Abiertos</a>
              <a class="dropdown-item" href="#">Ubicacion De Clave Catastral</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contactos
            </a>
            <div class="dropdown-menu" aria-labelledby="contactDropdown">
              <a class="dropdown-item" href="#"><i class="fab fa-facebook-square"></i> Facebook</a>
              <a class="dropdown-item" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
              <a class="dropdown-item" href="#"><i class="fas fa-map-marker-alt"></i> Ubicación</a>
            </div>
          </li>

          <!-- Modificar el formulario de búsqueda -->

          <form class="form-inline my-2 my-lg-0 ml-auto" style="max-width: 250px;"> <!-- Ajustar el tamaño del formulario -->
            <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search" style="width: 110px;"> <!-- Ajustar el tamaño del campo de búsqueda -->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>

      </ul>
    </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
