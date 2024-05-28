<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_disponibilidad.css">
    <title>Disponibilidad del Planeta</title>
</head>
<body>

    <?php
        require_once("../../includes/header_disponibilidad.php");
    ?>

    <!--
        Debajo se va mostrar varias cosas, se va a comprobar si el usuario ha iniciado sesion ya que para reservar viajes 
        debes de haber iniciado sesion  y si no ha iniciado sesion al darle al boton de reservar le mandara al login de la
        agencia.
    -->
    <div class="container mt-3">
        <div class="row">
            <?php
                /*
                    Una vez el usuario a iniciado sesion se llamara a la funcion reservaPlaneta() donde mediante el id del
                    viaje se mostrara el nombre del viaje, nombre del usuario, un calendario para seleccionar la fecha ,
                    ida y vuelta, la seleccion de la forma de pago y mostrando el precio.
                */
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
                    require_once("../../Proyecto.php");
                    $proyecto = new Proyecto();
                    $id_espacio = isset($_GET["id"]) ? $_GET["id"] : null;
                    if ($id_espacio) {
                        $reserva = $proyecto->dispoPlaneta($id_espacio);
                   
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    function limpiar($valor){
                        $valor = htmlspecialchars($valor);
                        $valor = trim($valor);
                        return $valor;
                    }

                    if(!empty($_POST["id_espacio"])){
                        $id_espacio = limpiar($_POST["id_espacio"]);
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

                    if (!empty($_POST["precio"])) {
                        $precio = limpiar($_POST["precio"]);
                    } 

                    $precio_total = $precio * $viajeros;

                    $estado = "no pagado";

                    if (empty($error)) {
                        $reservas = new Proyecto();
                        $reservas -> reservaEspacio($id_espacio, $id_usuario, $fecha_salida, $fecha_llegada, $viajeros, $precio_total, $estado);
                    }
                }
            ?> 
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../Viajes.php">Viajes</a></li>
                    <li class="breadcrumb-item"><a href="../categorias/Planetas.php">Planetas</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$reserva["destino"]?></li>
                </ol>
            </nav>

            <div class="reserva-card">
                <h3 class="card-title text-center mt-2 text-secondary"><?= $reserva["destino"] ?></h3>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4 col-4 mb-4">
                            <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($reserva["imagen1"]) ?> " style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4 col-4 mb-4">
                            <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($reserva["imagen2"]) ?> " style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-4 col-4 mb-4">
                            <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($reserva["imagen3"]) ?>" style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                    </div>
                    <h4 class="card-title text-center mt-2 text-secondary"> Descripción </h4>
                    <p class="text-center mt-4"> <?= $reserva["informacion"] ?></p>

                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id_espacio ?>" method="post">
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

                        <input type="hidden" name="id_espacio" value=" <?= $reserva["id_espacio"] ?>">
                        <input type="hidden" name="id_usuario" value=" <?= $_SESSION["id"] ?>">
                        <input type="hidden" name="precio" id="precio" value="<?= $reserva['precio'] ?>">

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-dark">Reservar</button>
                            <a href="../categorias/Planetas.php" class="btn btn-outline-danger"> Volver</a>
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
             <?php
                }else{
                    echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                    Debes de seleccionar un viaje espacial para ver su disponibilidad <br>
                    <a href='../categorias/Planetas.php'>Volver</a>
                </div>";
                }
            } else {
                header("location:../Login.php");
                exit();
            }
            ?>  
        </div>
    </div>

    <?php
        require_once("../../includes/footer.php");
        require_once("../../scripts/script_disponibilidad.php");
    ?>
</body>
</html>
