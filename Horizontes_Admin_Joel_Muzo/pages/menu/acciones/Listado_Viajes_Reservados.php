<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../estilos/Reservados.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Viajes Reservados</title>
</head>

<body>
  
    <?php
        require_once("../../../includes/header.php");
    ?>

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
        <div class="col-md-12">
            <h2>Menú de Categorías</h2>
            <select class="form-select" id="select-categorias">
                <option value="">Selecciona una categoría</option>
                <option value="Ofertas">Ofertas</option>
                <option value="Hoteles">Hoteles</option>
                <option value="Ciudades">Ciudades</option>
                <option value="Playas">Playas</option>
                <option value="Espaciales">Espaciales</option>
                <option value="Crucero">Crucero</option>
                <option value="Cultural">Cultural</option>
                <option value="Aventuras">Aventuras</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>Lista de Viajes</h2>
            <div class="table-responsive" id="tabla-viajes">
                <p>Selecciona una categoría para ver los viajes reservados</p>
            </div> 
        </div>
    </div>
</div>

    <?php  
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
      }else{
        echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                  Acceso no autorizado. <br> 
                  <a href='../../Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                </div>";
      }
    ?>

    <?php
        require_once("../../../includes/footer.php");
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var menuCategorias = document.getElementById("select-categorias");
      var contenidoViajes = document.getElementById("tabla-viajes");

      menuCategorias.addEventListener("change", function(event) {
        event.preventDefault();

        var categoriaSeleccionada = menuCategorias.value;

        if (categoriaSeleccionada === "Ofertas") {
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $oferta = new Proyecto2();
            echo $oferta->viajesOfertasReser();
          ?>`;
        }else if (categoriaSeleccionada === "Hoteles"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $hotel = new Proyecto2();
            echo $hotel->viajesHotelesReser();
          ?>`;
        }else if (categoriaSeleccionada === "Ciudades"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $ciudad = new Proyecto2();
            echo $ciudad->viajesCiudadesReser();
          ?>`;
        }else if (categoriaSeleccionada === "Playas"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $playa = new Proyecto2();
            echo $playa->viajesPlayasReser();
          ?>`;
        }else if (categoriaSeleccionada === "Espaciales"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $espaciales = new Proyecto2();
            echo $espaciales->viajesEspacialesReser();
          ?>`;
        }else if (categoriaSeleccionada === "Crucero"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $cruceros = new Proyecto2();
            echo $cruceros->viajesCrucerosReser();
          ?>`;
        }else if (categoriaSeleccionada === "Cultural"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $culturales = new Proyecto2();
            echo $culturales->viajesCulturalesReser();
          ?>`;
        }else if (categoriaSeleccionada === "Aventuras"){
        contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $aventuras = new Proyecto2();
            echo $aventuras->viajesAventurasReser();
          ?>`;
        }else{
        contenidoViajes.innerHTML = "<p>Selecciona una categoria</p>";
        }
      });
    });
  </script>
</body>
</html>