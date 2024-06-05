<script>
    document.addEventListener("DOMContentLoaded", function() {
      var menuCategorias = document.getElementById("select-categorias");
      var contenidoViajes = document.getElementById("tabla-viajes");

      menuCategorias.addEventListener("change", function(event) {
        event.preventDefault();

        var categoriaSeleccionada = menuCategorias.value;

        if (categoriaSeleccionada === "Inicio") {
          contenidoViajes.innerHTML = `
            <div class="text-center">
              <a href='crear viajes/Crear_viaje.php' class='btn btn-outline-primary p-2 mt-3'>Insertar nuevo viaje</a>
            </div>
          `;
        }else if(categoriaSeleccionada === "Ofertas") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $oferta = new Proyecto2();
            echo $oferta->listarOfertasAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Hoteles") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $hoteles = new Proyecto2();
            echo $hoteles->listarHotelesAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Ciudades") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $ciudades = new Proyecto2();
            echo $ciudades->listarCiudadesAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Playas") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $playas = new Proyecto2();
            echo $playas->listarPlayasAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Espaciales") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $espaciales = new Proyecto2();
            echo $espaciales->listarEspacialAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Crucero") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $crucero = new Proyecto2();
            echo $crucero->listarCruceroAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Cultural") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $cultural = new Proyecto2();
            echo $cultural->listarCulturalAdmin();
          ?>`;
        }else if(categoriaSeleccionada === "Aventuras") {
          contenidoViajes.innerHTML = `<?php
            require_once("../../../Proyecto2.php");
            $aventuras = new Proyecto2();
            echo $aventuras->listarAventuraAdmin();
          ?>`;
        }else{
          contenidoViajes.innerHTML = "<p>Selecciona una categoria</p>";
        }
      });
    });
  </script>