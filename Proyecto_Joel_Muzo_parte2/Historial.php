<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/css_historial.css">
    <title>Historial de viajes</title>
</head>
<body>
    <div class="parallax">
        <div class="overlay"></div>
        <div class="content">
            <h1>¡Experiencias Viajeras!</h1>
            <p>En esta página puedes ver tu historial de viajes.</p>
        </div>
    </div>
    <?php
        session_start();
        if(isset($_SESSION["nombre"])){
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2><u>Tus viajes</u></h2>
                <table class="table mt-3">
                    <tr>
                        <th scope="">Ubicacion</th>
                        <th>Precio</th>
                        <th>Fecha salida</th>
                        <th>Fecha llegada</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
        }else{
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                Acceso no autorizado. <br> 
                <a href='Login.php'> Por favor, inicia sesión.</a>
              </div>";
        }
    ?>

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