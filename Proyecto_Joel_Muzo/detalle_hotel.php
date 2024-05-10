<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/css_detalles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Detalles Hotel</title>
</head>
<body>
    
    <!-- 
        En esta pagina se va a recuperar el id del hotel que se pasado por GET y dicho hotel se le va ha añadir a la funcion 
        detallesHotel() dicha funcion lo que hace es mostrar mas detalles del hotel cuyo id sea igual al que sea recuperado.
    -->
    <?php
        require_once("Proyecto.php");
        $hotel = new Proyecto();
        $id_hotel = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id_hotel) {
            $hotel->detallesHotel($id_hotel);
        } else {
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                    Debes de selecionar un hotel para ver sus detalles <br>
                    <a href='Hoteles.php'>Volver</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

