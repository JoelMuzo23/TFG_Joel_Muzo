<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../estilos/css_hoteles.css">
    
    <title>Hoteles</title>
</head>
<body>
    
        <?php require_once "../includes/header.php"; ?>
    
    <!--
        Debajo se llamara a la funcion de listarHoteles(), dicha funcion mostrara en cards los hoteles
        mostrando sus datos y una imagen de referencia. 
      -->
    <div class="container mt-5">
        <h1 class="text-center mb-5"> Refugios de Lujo: Encuentra tu Estancia Perfecta </h1>
        <div class="row">
            <?php
            require_once "../Proyecto.php";
            $hotel = new Proyecto();
            $hotel->listarHoteles();
            ?>
        </div>
    </div>

    <?php require_once "../includes/footer.php"; ?>
</body>
</html>

