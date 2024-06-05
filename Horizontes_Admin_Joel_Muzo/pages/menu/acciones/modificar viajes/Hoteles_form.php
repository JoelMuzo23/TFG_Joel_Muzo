<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../../../estilos/Hoteles_form.css">
    <title>Modificar Hotel</title>
</head>
<body>
    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Modificar Datos del hotel</h1> 
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
        if(isset($_SESSION["nombre"])){
            require_once("../../../../Proyecto2.php");
            $proyecto = new Proyecto2();
            $id_hotel = isset($_GET["id_hotel"]) ? $_GET["id_hotel"] : null;
            if($id_hotel){
                $mod_hotel = $proyecto -> formularioHoteles($id_hotel);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                function limpiar($valor){
                    $valor = htmlspecialchars($valor);
                    $valor = trim($valor);
                    return $valor;
                }  
                
                if(!empty($_POST["nombre"])){
                    $nombre = limpiar($_POST["nombre"]);
                }else{
                    $error[] = "Por favor,  introduzca el nombre del hotel";
                }

                if(!empty($_POST["ciudad"])){
                    $ciudad = limpiar($_POST["ciudad"]);
                }else{
                    $error[] = "Por favor,  introduzca la ciudad del hotel";
                }

                if(!empty($_POST["estrellas"])){
                    $estrellas = limpiar($_POST["ciudad"]);
                }else{
                    $error[] = "Por favor,  introduzca la estrellas del hotel";
                }

                if(!empty($_POST["servicios"])){
                    $servicios = limpiar($_POST["servicios"]);
                }else{
                    $error[] = "Por favor,  introduzca los servicios del hotel";
                }

                if(!empty($_POST["precio"])){
                    $precio = limpiar($_POST["precio"]);
                }else{
                    $error[] = "Por favor,  introduzca el precio del hotel";
                }

                if(!empty($_POST["historia"])){
                    $historia = limpiar($_POST["historia"]);
                }else{
                    $error[] = "Por favor,  introduzca la historia del hotel";
                }

                if(!empty($_POST["servicio"])){
                    $servicio = limpiar($_POST["servicio"]);
                }else{
                    $error[] = "Por favor,  introduzca el servicio del hotel";
                }

                if(!empty($_POST["ubicacion"])){
                    $ubicacion = limpiar($_POST["ubicacion"]);
                }else{
                    $error[] = "Por favor,  introduzca la ubicacion del hotel";
                }

                if(empty($error)){
                    $modificar = new proyecto2();
                    $modificar -> modificarHotel($nombre, $ciudad, $estrellas, $servicios, $precio, $historia, $servicio, $ubicacion, $id_hotel);
                }
            }
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se llama a la funcion llamada formularioHoteles dicha función
        mostrara un formulario donde se va mostrar los datos del viaje de hoteles segun su id_hotel.  
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Modifica los datos del hotel</h1>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . "?id_hotel=" . $id_hotel ?>" method="post">
                    <div class="form-group mt-4">
                        <label for="nombre">Modifica el nombre del hotel </label> 
                        <input  type="text" class="form-control" id="nombre" name="nombre" placeholder=" <?=$mod_hotel["nombre"]?>">
                    </div>

                    <div class="form-group mt-4">
                        <label for="ciudad">Modifica la ciudad del hotel </label> 
                        <input  type="text" class="form-control" id="ciudad" name="ciudad" placeholder=" <?=$mod_hotel["ciudad"]?>">
                    </div> 

                    <div class="form-group mt-4">
                        <label for="estrellas">Modifica la ciudad del hotel </label> 
                        <input type="number" class="form-control" id="estrellas" name="estrellas" placeholder=" <?=$mod_hotel["estrellas"]?>">
                    </div>

                    <div class="form-group mt-4">
                        <label for="servicios">Modifica los servicios del hotel </label> 
                        <textarea class="form-control" name="servicios" id="servicios" rows="2"> <?=$mod_hotel["servicios"]?> </textarea>
                    </div> 

                    <div class="form-group mt-4">
                        <label for="precio">Modifica el precio del hotel </label> 
                        <input  type="number" class="form-control" id="precio" name="precio" placeholder=" <?=$mod_hotel["precio"] ?>">
                    </div> 

                    <div class="form-group mt-4">
                        <label for="historia">Modifica la historia del hotel </label> 
                        <textarea class="form-control" name="historia" id="historia" rows="5"> <?=$mod_hotel["historia"]?> </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="servicio">Modifica los servicios del hotel </label> 
                        <textarea class="form-control" name="servicio" id="servicio" rows="5"> <?=$mod_hotel["servicio"]?> </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="ubicacion">Modifica la ubicacion del hotel </label> 
                        <textarea class="form-control" name="ubicacion" id="ubicacion" rows="5"> <?=$mod_hotel["ubicacion"]?> </textarea>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-outline-primary">Modificar</button>
                        <a href="../Listado_Viajes.php" class="btn btn-outline-danger">Volver</a>
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
                echo "
                <div class='alert alert-danger mt-3 rounded-pill text-center ' role='alert'> 
                    Debes de seleccionar un viaje para modificar sus datos <br>
                    <a href='../Listado_Viajes.php'>Volver</a>
                </div>";
            }
        } else {
            header("location:../../../Login_admin.php");
            exit();
        }
        ?>
    </div>
    <?php
        require_once("../../../../includes/footer.php");
    ?>
</body>
</html>