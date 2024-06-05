<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_pago.css">
    <title>Pago Playa</title>
</head>
<body>
    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Completa Tu Reserva</h1>
            <!--Parrafo descriptivo-->
            <p>Pago Seguro</p>
        </div>
    </div>

    <div class="container">
        <div class="row mt-2">
            <nav aria-label="breadcrumb" class="bread">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../Inicio.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../menu_usuario/Mis_reservas.php">Mis Reservas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pago</li>
                </ol>
            </nav>
            <div class="col-12">
                <h3 class="text-center mb-3">Resumen de la reserva</h3>
                <?php
                session_start();
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
                    require_once("../../Proyecto.php");
                    $proyecto = new Proyecto();
                    $id_reserva = isset($_GET["id"]) ? $_GET["id"] : null;
                    if ($id_reserva) {
                        $pagoP = $proyecto->metodoPagoPlaya($id_reserva); 

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    function limpiar($valor){
                        $valor = htmlspecialchars($valor);
                        $valor = trim($valor);
                        return $valor;
                    }

                    if (!empty($_POST["numero"])) {
                        $numero = limpiar($_POST["numero"]);
                        if (strlen($numero) !== 16) {
                            $error[] = "El número de tarjeta debe contener 16 dígitos.";
                        }                    
                    } else {
                        $error[] = "Por favor, introduzca el numero de la tarjeta";
                    }


                    if (!empty($_POST["fecha"])) {
                        $fecha = limpiar($_POST["fecha"]);
                        if (!preg_match("/^\d{2}\/\d{2}$/", $fecha)) {
                            $error[] = "El formato de la fecha de vencimiento debe ser MM/AA.";
                        } else {
                            $anio_actual = date("y"); 
                            $anio_ingresado = substr($fecha, 3); 
                            
                            if ($anio_ingresado < $anio_actual) {
                                $error[] = "La fecha de vencimiento no puede ser menor que la fecha actual.";
                            }
                        }
                    } else {
                        $error[] = "Por favor, introduzca el fecha de caducidad de la tarjeta";
                    }

                    if (!empty($_POST["cvv"])) {
                        $cvv = limpiar($_POST["cvv"]);
                        if (strlen($cvv) !== 3) {
                            $error[] = "El cvv de tarjeta debe contener 3 dígitos.";
                        } 
                    } else {
                        $error[] = "Por favor, introduzca el cvv de la tarjeta";
                    }

                    if(!empty($_POST["id_reserva"])){
                        $id_reserva = limpiar($_POST["id_reserva"]);
                    }

                    $estado = "pagado";

                    if (empty($error)) {
                        $recibo = new Proyecto();
                        $recibo -> pagoPlaya($id_reserva, $estado);
                    }
                }

                ?>

                <form action=<?=htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id_reserva ?> method="post">
                    <div class="reserva-card text-center">
                        <div class="card-content">
                            <h2 class="card-title mt-2"><?= $pagoP['nombre'] ?></h2>
                                <div class="card-details ">
                                    <h6 class="text-secondary">Fecha Salida:</h6>
                                    <p> <?= $pagoP['fecha_salida'] ?> </p>
                                    <h6 class="text-secondary">Fecha Llegada:</h6>
                                    <p> <?= $pagoP['fecha_llegada'] ?> </p>
                                </div>
                            <h2 class="card-title mt-3"> Selecciona la opcion de pago</h2>
                            <div class="card-details">
                                <label>
                                    <input type="radio" name="metodoPago" value="tarjeta" onchange="mostrarFormularioPago()"> Pago con Tarjeta
                                </label>

                                <div id="formularioTarjeta" class="hidden mt-3">
                                    <h2>Formulario de Pago con Tarjeta</h2>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="card-img-top" src="data:image/jpeg;base64, <?php echo base64_encode($pagoP['imagen']) ?>" style="width: 100%; height: 150px; object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex align-items-end mt-4 mb-2">
                                                <p class="h4"> <span class="pe-1"> <?= $pagoP['nombre'] ?> </span></p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="textmuted">Viajeros:</p>
                                                <p class="fw-bold"><?= $pagoP['numero_viajeros'] ?> Personas</p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="textmuted">Precio por persona:</p>
                                                <p class="fw-bold"><?= $pagoP['precio'] ?> €</p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="textmuted">Precio total: <small>(IVA incluido)</small></p>
                                                <p class="fw-bold"><?= $pagoP['precio_total'] ?> €</p>
                                            </div>
                                        </div>
                                    
                                        <div class="row bg-light p-4 rounded">
                                            <h3 class="mt-3 mb-4">Detalles de pago</h3>
                                            <div class="col-md-12 mt-4">
                                                <label for="numero" class="form-label">Número de la tarjeta</label>
                                                <div class="input">
                                                <i class="fa fa-credit-card"></i>
                                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="1234 5678 9012 3456">
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <label for="fecha" class="form-label">Fecha de vencimiento</label>
                                                <div class="input">
                                                    <i class="fa fa-calendar"></i>
                                                    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="MM/AA">
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <label for="cvv" class="form-label">CVV</label>
                                                <div class="input">
                                                    <i class="fa fa-lock"></i>
                                                    <input type="number" class="form-control" id="cvv" name="cvv" placeholder="123">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_reserva" id="id_reserva" value=" <?= $pagoP["id_reserva"] ?> ">
                                        <button type="submit" class="btn btn-outline-success">Pago</button>
                                        <?php
                                            if (!empty($error)) {
                                                foreach ($error as $datos) {
                                                    echo '<div class="alert alert-danger mt-3 rounded-pill text-center" role="alert">' . $datos ."</div>";
                                                }
                                            }
                                        ?> 
                                    </div>
                                </div>

                                <br>

                                <label>
                                    <input type="radio" name="metodoPago" value="bancario" onchange="mostrarFormularioPago()"> Transferencia bancaria
                                </label>

                                <div id="formularioBancario" class="hidden mt-3"> 
                                    <a href="pdf/PDFPlaya.php?id=<?= $pagoP['id_reserva'] ?>" class="btn btn-outline-danger"> Generar PDF </a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </form>
                <?php
                    }else{
                        echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                            Debes de seleccionar una viaje que tengas reservado para su pago <br>
                            <a href='../menu_usuario/Mis_reservas.php'>Volver</a>
                        </div>";
                    }
                    } else {
                        header("location:../Login.php");
                        exit();
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
        require_once("../../scripts/script_pago.php");
    ?>
</body>
</html>