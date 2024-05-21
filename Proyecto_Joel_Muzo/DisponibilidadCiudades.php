<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_reserva.css">
    <title>Disponibilidad de Ciudades</title>
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
                 /*
                    Una vez el usuario a iniciado sesion se llamara a la funcion reservaCiudades() donde mediante el id del
                    viaje se mostrara el nombre del viaje, nombre del usuario, un calendario para seleccionar la fecha de ida y vuelta,
                    la seleccion de la forma de pago y mostrando el precio.
                */
                session_start();
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
                    require_once("Proyecto.php");
                    $proyecto = new Proyecto();
                    $id_ciudad = isset($_GET["id_ciudad"]) ? $_GET["id_ciudad"] : null;
                    if ($id_ciudad) {
                        $reserva = $proyecto->dispoCiudades($id_ciudad);
                    }else{
                        header("Location: Ciudades.php");
                        exit();
                    }
                } else {
                    header("location:Login.php");
                    exit();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    function limpiar($valor){
                        $valor = htmlspecialchars($valor);
                        $valor = trim($valor);
                        return $valor;
                    }

                    if(!empty($_POST["id_ciudad"])){
                        $id_ciudad = limpiar($_POST["id_ciudad"]);
                    }

                    if(!empty($_POST["id_usuario"])){
                        $id_usuario = limpiar($_POST["id_usuario"]);
                    }


                    if (!empty($_POST["fecha_salida"])) {
                        $fecha_salida = limpiar($_POST["fecha_salida"]);
                    } else {
                        $error[] = "Por favor, seleccione la fecha de salida";
                    }

                    if (!empty($_POST["fecha_llegada"])) {
                        $fecha_llegada = limpiar($_POST["fecha_llegada"]);
                    } else {
                        $error[] = "Por favor, seleccione la fecha de llegada";
                    }

                    if(!empty($_POST["viajeros"])){
                        $viajeros = limpiar($_POST["viajeros"]);
                    }

                    if (empty($error)) {
                        require_once "Proyecto.php";
                        $reservas = new Proyecto();
                        $reservas -> reservaCiudad($id_ciudad, $id_usuario, $fecha_salida, $fecha_llegada, $viajeros);
                    }
                }
            ?>

            <div class="reserva-card">
                <h3 class="card-title text-center mt-2 text-secondary"> <?= $reserva["nombre"] . " - ". $reserva["pais"] ?> </h3>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4 col-4 mb-4">
                            <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($reserva["imagen1"]) ?>" style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4 col-4 mb-4">
                            <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($reserva["imagen2"]) ?>" style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4 col-4 mb-4">
                            <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($reserva["imagen3"]) ?>" style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                    </div>

                    <h4 class="card-title text-center mt-2 text-secondary"> Descripción </h4>
                    <p class="text-center mt-4"> <?= $reserva["informacion"] ?></p>

                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?id_ciudad=' . $id_ciudad ?>" method='post'>
                        <div class="form-group">
                            <h4 class="card-title text-center mt-5 text-secondary"> Selecciona la fecha de salida </h4>
                            <input id="fecha_salida" name="fecha_salida" class="form-control" type="date" min="<?php echo date("Y-m-d") ?>">
                        </div>

                        <div class="form-group mt-5">
                            <h4 class="card-title text-center mt-5 text-secondary"> Selecciona la fecha de llegada </h4>
                            <input id="fecha_llegada" name="fecha_llegada" class="form-control" type="date" min="<?php echo date("Y-m-d") ?>">
                        </div><br>

                        <div class="form-group mb-4">
                            <h4 class="card-title text-center mt-3 text-secondary">Selecciona el número de viajeros</h4>
                            <div class="counter-container">
                                <button type="button" class="counter-button btn btn-outline-dark" id="decrement-btn">-</button>
                                <input type="number" class="counter-input form-control" id="viajeros" name="viajeros" value="1" min="1" max="10" readonly>
                                <button type="button" class="counter-button btn btn-outline-dark" id="increment-btn">+</button>
                            </div>
                        </div>

                        <input type="hidden" name="id_ciudad" id="id_ciudad" value=" <?= $reserva["id_ciudad"] ?> ">
                        <input type="hidden" name="id_usuario" id="id_usuario" value=" <?= $_SESSION["id"] ?> ">
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-dark">Reservar</button>
                        </div>
                    </form>
                </div>
            </div>     
            <?php
                if (!empty($error)) {
                    foreach ($error as $datos) {
                        echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' . $datos ."</div>";
                    }
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
    <script>
        document.getElementById("increment-btn").addEventListener("click", function() {
            var input = document.getElementById("viajeros");
            var currentValue = parseInt(input.value);
            if (currentValue < parseInt(input.max)) {
                input.value = currentValue + 1;
            }
        });

        document.getElementById("decrement-btn").addEventListener("click", function() {
            var input = document.getElementById("viajeros");
            var currentValue = parseInt(input.value);
            if (currentValue > parseInt(input.min)) {
                input.value = currentValue - 1;
            }
        });
    </script>
</body>
</html>
