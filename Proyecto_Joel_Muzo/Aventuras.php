<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_aventuras.css">
    <title>Aventuras</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>Explora lo Desconocido: Viajes de Aventura por Tierra, Mar y Aire</h1>
        </div>
    </div>

    <!--
        Debajo se llamara a la funcion de listarAventuras(), dicha funcion mostrara en cards los viajes de ofertas, 
        mostrando sus datos y una imagen de referencia. 
      -->
    <div class="container mt-5">
        <div class="row">
            <?php
                require_once("Proyecto.php");
                $aventura = new Proyecto();
                $aventura -> listarAventuras();
            ?>
        </div>
    </div>
    
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
</body>
</html>