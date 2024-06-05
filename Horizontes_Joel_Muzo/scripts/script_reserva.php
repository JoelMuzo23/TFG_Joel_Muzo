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