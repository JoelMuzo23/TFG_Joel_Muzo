
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../estilos/css_ofertas.css">
    <title>Ofertas</title>
</head>
<body>
    
        <?php require_once "../includes/header.php"; ?>

    <!-- Contenido de la página -->
    <div class="container mt-5">

        <!-- Texto Descriptivo  -->
        <h1 class="text-center mb-5">"¡Descubre Nuestras Ofertas Exclusivas para Viajar!"</h1>

        <!-- Tarjetas de los diferentes viajes --> 
        <div class="row">
            <?php
            require_once "../Proyecto.php";
            $ofertas = new Proyecto();
            $ofertas->listarOfertas();
            ?>
        </div>
    </div>

        <?php require_once "../includes/footer.php"; ?>
    
</body>
</html>

