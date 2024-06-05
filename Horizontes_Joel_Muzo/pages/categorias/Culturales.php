<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_culturales.css">
    <title>Culturales</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>Explora el Patrimonio: Viajes Culturales alrededor del Mundo</h1>
        </div>
    </div>

    <!--
        Debajo se llamara a la funcion de listarCulturales(), dicha funcion mostrara en cards los viajes culturales, 
        mostrando sus datos y una imagen de referencia. 
    -->
    <div class="container">
        <div class="row mt-2">
            <nav aria-label="breadcrumb" class="bread mb-3 mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../Inicio.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../Viajes.php">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Culturales</li>
                </ol>
            </nav>
            <?php
                require_once("../../Proyecto.php");
                $cultura = new Proyecto();
                $cultura -> listarCulturales();
            ?>
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>