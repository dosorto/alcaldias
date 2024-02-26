<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
/* Estilos para el cuerpo de la página */
body {
  background-color: #eee;/* Azul turquesa */
}

/* Estilos para el menú desplegable en pantallas pequeñas */
@media (max-width: 767px) {
  .navbar .dropdown-menu .dropdown-item {
    padding: .5rem 1rem;
  }
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-height: 40px;"> <!-- Modificar la altura mínima -->
  <div class="container">
    <a class="navbar-brand ml-auto" href="#">
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-ayuntamiento_114360-15155.jpg"
                    style="width: 60px;" alt="logo">
                    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Inicio <i class="bi bi-house-door-fill"></i></a>


        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Alcaldia Municipal
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Mision y Visión  <i class="bi bi-graph-up"></i></a>
              <a class="dropdown-item" href="#">Ley De Municipalidad  </a>
              <a class="dropdown-item" href="#">Documentos De Interes  <i class="bi bi-file-text"></i></a>
            </div>
          </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Atencion Ciudadano
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Bienes Inmuebles</a>
            <a class="dropdown-item" href="#">Cambio de RTN  <i class="bi bi-copy"></i></a>
            <a class="dropdown-item" href="#">Matrimonio Civil  <i class="bi bi-postcard-heart"></i></a>
            <a class="dropdown-item" href="#">Solvencia Municipal  <i class="bi bi-wallet"></i></a>
          </div>
        </li>
      @role('Administrador')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administración
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('admin.users.index') }}">Gestión de usuarios <i class="bi bi-person-fill-gear"></i></a>
            <a class="dropdown-item" href="role-list">Gestión de roles <i class="bi bi-list-check"></i></a>
          </div>
        </li>
@endrole
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Gerencia Catastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Limites y Colindancias  <i class="bi bi-compass"></i></a>
            <a class="dropdown-item" href="#">INA  <i class="bi bi-brightness-high-fill"></i></a>
            <a class="dropdown-item" href="#">Descuento Tercera Edad  <i class="bi bi-cash-coin"></i></a>
            <a class="dropdown-item" href="#">Ubicacion De Clave Catastral  </a>
          </div>
        </li>
{{--
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Noticias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Comunicados</a>
              <a class="dropdown-item" href="#">Notas De Prensa  <i class="bi bi-newspaper"></i></a>
              <a class="dropdown-item" href="#">Calendario-Cabildos Abiertos  <i class="bi bi-calendar3"></i></a>
            </div>
          </li> --}}

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contactos
            </a>

            <div class="dropdown-menu" aria-labelledby="contactDropdown">
              <a class="dropdown-item" href="#" style="width: 40px;">Facebook  <i class="bi bi-facebook"></i></a>
              <a class="dropdown-item" href="#" style="width: 40px;">WhatsApp  <i class="bi bi-whatsapp"></i> </a>
              <a class="dropdown-item" href="#" style="width: 40px;">Ubicacion <i class="bi bi-geo-alt"></i></a>
            </div>

          </li>

          <!-- Modificar el formulario de búsqueda -->

          <form class="form-inline my-2 my-lg-0 ml-auto" style="max-width: 250px;"> <!-- Ajustar el tamaño del formulario -->
            <input class="form-control mr-sm-2" type="search" placeholder="Escriba..." aria-label="Search" style="width: 110px;"> <!-- Ajustar el tamaño del campo de búsqueda -->
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
          </form>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
              {{ Auth::user()->name }}</a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>

          </li>



      </ul>
    </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
</body>
</html>
