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