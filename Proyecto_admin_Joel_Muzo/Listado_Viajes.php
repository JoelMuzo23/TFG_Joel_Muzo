<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin de Categorías de Viajes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/Listado_Viajes.css">
</head>
<body>
  
  <!-- Aqui se muestra una barra de navegacion en el cual incluye un logo y un boton para volver al menu del administrador -->
  <nav class="navbar navbar-expand-lg bg-black">
      <div class="container-fluid">
          <img class="logo" src="img/Logo.png" alt="">
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end ml-3" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <div class="boton"> <a class="nav-link" aria-current="page" href="AdminMenu.php">Volver</a> </div>
              </li>
            </ul>
          </div> 
      </div>
  </nav>

  <?php
  /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
    if(isset($_SESSION["nombre"])){
  ?>

  <!-- 
      Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo y despues una lista mostrando las diferentes categorias, una vez le
      de mostrara la lista de los viajes que se haya seleccionado
     -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 col-12">
              <h2>Menú de Categorías</h2>
                <div class="list-group" id="menu-categorias">
                  <a class="list-group-item list-group-item-action list-group-item-light">Inicio</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Ofertas</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Hoteles</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Ciudades</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Playas</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Espaciales</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Crucero</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Cultural</a>
                  <a class="list-group-item list-group-item-action list-group-item-light">Aventuras</a>
                </div>
            </div>
          <div class="col-md-8 col-12">
            <h2>Lista de Viajes</h2>
            <div class="table-responsive" id="tabla-viajes">
                  <p>Selecciona una categoria</p>
            </div>
          </div>
        </div>
      </div>

    <?php  
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
      }else{
        echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                  Acceso no autorizado. <br> 
                  <a href='Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                </div>";
      }
    ?>

  <!-- Parte Inferior de la pagina -->
  <div class="row mt-3">
    <div class="col-md-12">
      <!-- Caja donde va ha estar el autor de la pagina-->
      <div class="caja">
        <!-- Caja donde van a estar los botones de las redes sociales -->
        <div>
          <a href="#" class="icono"><i class="fab fa-instagram"></i></a>
          <a href="#" class="icono"><i class="fab fa-facebook"></i></a>
          <a href="#" class="icono"><i class="fab fa-twitter"></i></a>
        </div>
        <p>@JoelMuzo - I♥</p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Este script se usa para mostrar la lista de los viajes segun la categoria seleccionada-->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var menuCategorias = document.getElementById("menu-categorias");
      var contenidoViajes = document.getElementById("tabla-viajes");

      menuCategorias.addEventListener("click", function(event) {
        event.preventDefault();

        var categoriaSeleccionada = event.target.textContent.trim();

        if (categoriaSeleccionada === "Inicio"){
          contenidoViajes.innerHTML = `
          <div class="text-center">
            <a href='Crear_viaje.php' class='btn btn-outline-primary p-2 mt-3'>Insertar nuevo viaje</a>
          </div>
          `;
        }else if(categoriaSeleccionada === "Ofertas") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $oferta = new Proyecto2();
            echo $oferta->listarOfertasAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Hoteles") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $hoteles = new Proyecto2();
            echo $hoteles->listarHotelesAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Ciudades") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $ciudades = new Proyecto2();
            echo $ciudades->listarCiudadesAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Playas") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $playas = new Proyecto2();
            echo $playas->listarPlayasAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Espaciales") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $espaciales = new Proyecto2();
            echo $espaciales->listarEspacialAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Crucero") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $crucero = new Proyecto2();
            echo $crucero->listarCruceroAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Cultural") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $cultural = new Proyecto2();
            echo $cultural->listarCulturalAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Aventuras") {
          contenidoViajes.innerHTML = `<?php
            require_once("Proyecto2.php");
            $aventuras = new Proyecto2();
            echo $aventuras->listarAventuraAdmin();
          ?>`;
        }else{
          contenidoViajes.innerHTML = "<p>adios</p>";
        }
      });
    });
  </script>
</body>
</html>
