<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_playas.css">
    <title>Playas</title>
</head>
<body>
    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>Explora el Paraíso: Viajes Inolvidables a las Mejores Playas del Mundo</h1> 
        </div>
    </div>

    <!--
        Debajo se llamara a la funcion de listarPlayas(), dicha funcion mostrara en cards los viajes de la playa, 
        mostrando sus datos y una imagen de referencia. 
    -->
    <div class="container mt-5">
        <div class="row">
            <?php
                require_once("../../Proyecto.php");
                $espacio = new Proyecto();
                $espacio -> listarPlayas();
            ?>
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>