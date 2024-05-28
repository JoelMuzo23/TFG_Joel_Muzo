<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_cruceros.css">
    <title>Cruceros</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>Estrellas en el Mar: Viajes Espaciales en Crucero</h1>
        </div>
    </div>

    <!--
        Debajo se llamara a la funcion de listarCruceros(), dicha funcion mostrara en cards los viajes de crucero, 
        mostrando sus datos y una imagen de referencia. 
    -->
    <div class="container mt-5">
        <div class="row">
            <?php
                require_once("../../Proyecto.php");
                $crucero = new Proyecto();
                $crucero -> listarCruceros();
            ?>
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>