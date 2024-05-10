<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_reserva.css">
    <title>Reserva de Viajes</title>
</head>
<body>

    <!-- Aqui se muestra una barra de navegacion en el cual incluye un logo y un boton para volver al menu del administrador -->
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">
            <img class="logo" src="img/Logo.png" alt="">
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end ml-3" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="boton"> <a class="nav-link" aria-current="page" href="Ciudades.php">Volver</a> </div>
                </li>
                </ul>
            </div> 
        </div>
    </nav>

    <!--
        Debajo se va mostrar varias cosas, se va a comprobar si el usuario ha iniciado sesion ya que para reservar viajes 
        debes de haber iniciado sesion  y si no ha iniciado sesion al darle al boton de reservar le mandara al login de la
        agencia.
    --> 
    <div class="container mt-3">
        <div class="row">
            <?php
                session_start();
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {

                    /*
                        Una vez el usuario a iniciado sesion se llamara a la funcion reservaCiudades() donde mediante el id del
                        viaje se mostrara el nombre del viaje, nombre del usuario, un calendario para seleccionar la fecha de ida y vuelta,
                        la seleccion de la forma de pago y mostrando el precio.
                    */
                    require_once("Proyecto.php");
                    $reserva = new Proyecto();
                    $id_ciudad = isset($_GET['id_ciudad']) ? $_GET['id_ciudad'] : null;
                    if ($id_ciudad) {
                        $reserva->reservaCiudades($id_ciudad);
                    }
                } else {
                    header("location:Login.php");
                }
            ?>    
        </div>
    </div>

    <!-- Parte Inferior de la pagina -->
    <div class="row">
        <div class="col-md-12">
            <!-- Caja donde va a estar el autor de la página-->
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
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
