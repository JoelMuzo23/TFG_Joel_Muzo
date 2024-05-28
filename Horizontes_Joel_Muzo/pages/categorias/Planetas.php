<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_planetas.css">
    <title>Planetas</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>Explora el Universo: Viajes Espaciales Inolvidables</h1> 
        </div>
    </div>

    <!--
        Despues se llamara las funciones listarPlanetas() y listarPlanetas2(), dichas funciones mostraran una card
        mostrando los viajes a los planetas, esto se llamara siempre y cuando el usuario ha iniciado sesion le mostrara
        la funcion listarPlanetas() que mostrara los viajes a luna y marte y si no ha iniciado llamara a la funcion 
        listarPlanetas2() que solo mostrara el viaje a la luna.
      -->
    <div class="container mt-5">
        <div class="row">
            <?php
            session_start();
            if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
                require_once("../../Proyecto.php");
                $planeta = new Proyecto();
                $planeta -> listarPlanetas();
            }else{
                require_once("../../Proyecto.php");
                $planeta2 = new Proyecto();
                $planeta2 -> listarPlanetas2();
            }
            ?>
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>