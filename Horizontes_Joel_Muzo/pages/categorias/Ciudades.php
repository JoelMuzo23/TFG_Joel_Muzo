<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_ciudades.css">
    <title>Ciudades</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>Descubre el Mundo: Viajes Inolvidables a Ciudades Fascinantes</h1>
        </div>
    </div>

    <!--
        Debajo se llamara a la funcion de listarCiudades(), dicha funcion mostrara en cards los viajes de la ciudad, 
        mostrando sus datos y una imagen de referencia. 
      -->
    <div class="container mt-5">
        <div class="row">
            <?php
                require_once("../../Proyecto.php");
                $ciudad = new Proyecto();
                $ciudad -> listarCiudades();
            ?>
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>