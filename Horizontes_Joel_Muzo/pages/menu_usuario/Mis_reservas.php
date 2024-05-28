<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilos/css_historial.css">
    <title>Historial de viajes</title>
</head>
<body>
    <div class="parallax">
        <div class="overlay"></div>
        <div class="content">
            <h1>Mis Aventuras Reservadas</h1>
            <p>Explora tus planes de viaje y detalles de cada aventura.</p>
        </div>
    </div>
    <?php
        session_start();
        if(isset($_SESSION["nombre"])){
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2 col-12">
                <div class="list-group" id="menu-categorias">
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
            <div class="col-md-10 col-12">
                <h2>Mis Reservas</h2>
                <div class="table-responsive" id="tabla-viajes">
                    <p class="text-center">Listado de tus reservas</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="text-center">
      <a class="btn btn-outline-danger" href="../Inicio.php">Volver</a>
    </div>

    <?php
        }else{
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                Acceso no autorizado. <br> 
                <a href='../Login.php'> Por favor, inicia sesión.</a>
              </div>";
        }
    ?>
    
    <?php
        require_once("../../includes/footer.php");
    ?>

    

      <!-- Este script se usa para mostrar la lista de los viajes segun la categoria seleccionada-->
      <script>
    document.addEventListener("DOMContentLoaded", function() {
      var menuCategorias = document.getElementById("menu-categorias");
      var contenidoViajes = document.getElementById("tabla-viajes");

      menuCategorias.addEventListener("click", function(event) {
        event.preventDefault();

        var categoriaSeleccionada = event.target.textContent.trim();

        if(categoriaSeleccionada === "Ofertas") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $oferta = new Proyecto();
            echo $oferta->listarReservasOf();
          ?>`;

        }else if(categoriaSeleccionada === "Hoteles") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $hotel = new Proyecto();
            echo $hotel->listarReservasHo();
          ?>`;

        }else if(categoriaSeleccionada === "Ciudades") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $ciudades = new Proyecto();
            echo $ciudades->listarReservasCiu();
          ?>`;

        }else if(categoriaSeleccionada === "Playas") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $playas = new Proyecto();
            echo $playas->listarReservasPla();
          ?>`;

        }else if(categoriaSeleccionada === "Espaciales") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $espacio = new Proyecto();
            echo $espacio->listarReservasEsp();
          ?>`;

        }else if(categoriaSeleccionada === "Crucero") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $crucero = new Proyecto();
            echo $crucero->listarReservasCru();
          ?>`;

        }else if(categoriaSeleccionada === "Cultural") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $cultural = new Proyecto();
            echo $cultural->listarReservasCul();
          ?>`;

        }else if(categoriaSeleccionada === "Aventuras") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../Proyecto.php");
            $aventura = new Proyecto();
            echo $aventura->listarReservasAve();
          ?>`;

        }else{
          contenidoViajes.innerHTML = "<p>adios</p>";
        }
      });
    });
  </script>
</body>
</html>