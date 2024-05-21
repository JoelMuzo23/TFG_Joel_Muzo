<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_pago.css">
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
            <div class="col-12">
                <h3 class="text-center mb-3">Resumen de la reserva</h3>
                <?php
                session_start();
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
                    require_once("Proyecto.php");
                    $proyecto = new Proyecto();
                    $id_reserva = isset($_GET["id"]) ? $_GET["id"] : null;
                    if ($id_reserva) {
                        $pagoP = $proyecto->pagoPlaya($id_reserva);          
                ?>
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
                                                <p class="fw-bold"><?= $pagoP['numero_viajeros'] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="textmuted">Precio por persona:</p>
                                                <p class="fw-bold"><?= $pagoP['precio'] ?></p>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <p class="textmuted">Precio total:</p>
                                                <p class="fw-bold"><?= $pagoP['precio'] * $pagoP['numero_viajeros'] ?></p>
                                            </div>
                                        </div>
                                    
                                        <div class="row bg-light p-4 rounded">
                                            <h3 class="mt-3 mb-4">Detalles de pago</h3>
                                            <div class="col-md-12 mt-4">
                                                <label for="numero" class="form-label">Número de la tarjeta</label>
                                                <div class="input">
                                                <i class="fa fa-credit-card"></i>
                                                    <input type="number" class="form-control" id="numero" placeholder="1234 5678 9012 3456">
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <label for="fecha" class="form-label">Fecha de vencimiento</label>
                                                <div class="input">
                                                    <i class="fa fa-calendar"></i>
                                                    <input type="text" class="form-control" id="fecha" placeholder="MM/AA">
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-4">
                                                <label for="cvv" class="form-label">CVV</label>
                                                <div class="input">
                                                    <i class="fa fa-lock"></i>
                                                    <input type="number" class="form-control" id="cvv" placeholder="123">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-outline-success mt-4">Pagar</a>
                                    </div>
                                </div>

                                <br>

                                <label>
                                    <input type="radio" name="metodoPago" value="bancario" onchange="mostrarFormularioPago()"> Transferencia bancaria
                                </label>

                                <div id="formularioBancario" class="hidden mt-3"> 
                                    <a href="PDFPlaya.php?id=<?= $pagoP['id_reserva'] ?>" class="btn btn-outline-danger"> Generar PDF </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    } else {
                        echo "Error";
                    }
                ?> 
            
            </div>
        </div>
    </div>

    <script>
        function mostrarFormularioPago() {
            var metodoPago = document.querySelector('input[name="metodoPago"]:checked').value;

            if (metodoPago === "tarjeta") {
                document.getElementById("formularioTarjeta").classList.remove("hidden");
                document.getElementById("formularioBancario").classList.add("hidden");
            } else if (metodoPago === "bancario") {
                document.getElementById("formularioBancario").classList.remove("hidden");
                document.getElementById("formularioTarjeta").classList.add("hidden");
                // Aquí podrías generar el IBAN automáticamente o con una llamada AJAX
                document.getElementById("iban").value = "ES9121000418450200051332";
            }
        }
    </script>
</body>
</html>