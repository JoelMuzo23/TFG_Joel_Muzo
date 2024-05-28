<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../../../estilos/Hoteles_admin.css">
    <title>Hotel Admin</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold"> Hoteles</h1> 
            <!--Encabezado secundario del fondo-->
            <h3 class="display-8 fw-bold">Hoteles: Administración Central</h3>
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
    if(isset($_SESSION["nombre"])){

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
                $estrellas = limpiar($_POST["estrellas"]);
            }else{
                $error[] = "Por favor,  introduzca las estrellas del hotel";
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

            if(!empty($_FILES["imagen"]["name"])){
                $imagen = $_FILES["imagen"]["tmp_name"];
                $imagen_hotel = file_get_contents($imagen);
            }else{
                $error[] = "Por favor, introduzca una imagen";
            }

            if(!empty($_FILES["imagen1"]["name"]) && !empty($_FILES["imagen2"]["name"]) && !empty($_FILES["imagen3"]["name"])){
                $imagen1 = $_FILES["imagen1"]["tmp_name"];
                $imagen2 = $_FILES["imagen2"]["tmp_name"];
                $imagen3 = $_FILES["imagen3"]["tmp_name"];
                $imagen_hotel1 = file_get_contents($imagen1);
                $imagen_hotel2 = file_get_contents($imagen2);
                $imagen_hotel3 = file_get_contents($imagen3);
            }else{
                $error[] = "Por favor, introduzca las imágenes del hotel";
            }
            
            if(!empty($_POST["historia"])){
                $historia = limpiar($_POST["historia"]);
            }else{
                $error[] = "Por favor,  introduzca la historia del hotel";
            }

            if(!empty($_POST["servicios_extend"])){
                $servicios_extend = limpiar($_POST["servicios_extend"]);
            }else{
                $error[] = "Por favor,  introduzca más servicios sobre el hotel";
            }
            
            if(!empty($_POST["ubicacion"])){
                $ubicacion = limpiar($_POST["ubicacion"]);
            }else{
                $error[] = "Por favor,  introduzca la ubicacion del hotel";
            }

            if(empty($error)){
                require_once("../../../../Proyecto2.php");
                $insertar = new proyecto2();
                $insertar -> insertarViajeHo($nombre, $ciudad, $estrellas, $servicios, $precio, $imagen_hotel, $imagen_hotel1, $imagen_hotel2, $imagen_hotel3, $historia, $servicios_extend, $ubicacion);
            }
        }
    ?>
    
    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se mostrara un formulario para insertar un nuevo viaje de la tematica de hotel,
        este formulario se valida y se limpia de caracteres malisiosos y seguido dichos valores introducidos por el admin se agregaran a la funcion insertarViajeHo(),
        que basicamente va a insertar dicho viaje a la base de datos.
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Introduce los datos del hotel</h2>
                <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Introduce el nombre del hotel</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($_POST["nombre"] ?? '')?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Introduce el nombre de la ciudad del hotel</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= htmlspecialchars($_POST["ciudad"] ?? '')?>">
                    </div>
                    <div class="form-group">
                        <label for="estrellas">Introduce el numero de estrellas del hotel</label>
                        <input type="number" class="form-control" id="estrellas" name="estrellas" value="<?= htmlspecialchars($_POST["estrellas"] ?? '')?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="servicios">Introduce los servicios del hotel</label>
                        <textarea class="form-control" id="servicios" name="servicios" rows="3"><?= htmlspecialchars($_POST["servicios"] ?? '')?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Introduce el precio del hotel</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($_POST["precio"] ?? '')?>">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="imagen">Inserta la imagen del hotel</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <div class="form-group mt-3">
                        <label for="imagen">Inserta tres imagenes para mas informacion del hotel</label>
                        <input type="file" class="form-control mt-2" id="imagen1" name="imagen1">
                        <input type="file" class="form-control mt-2" id="imagen2" name="imagen2">
                        <input type="file" class="form-control mt-2" id="imagen3" name="imagen3">
                    </div>
                    <div class="form-group mt-3">
                        <label for="historia">Introduce la historia sobre el hotel</label>
                        <textarea class="form-control" id="historia" name="historia" rows="3"><?= htmlspecialchars($_POST["historia"] ?? '')?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="servicios_extend">Introduce más servicios del hotel</label>
                        <textarea class="form-control" id="servicios_extend" name="servicios_extend" rows="2"><?= htmlspecialchars($_POST["servicios_extend"] ?? '')?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="ubicacion">Introduce la ubicacion del hotel</label>
                        <textarea class="form-control" id="ubicacion" name="ubicacion" rows="2"><?= htmlspecialchars($_POST["ubicacion"] ?? '')?></textarea>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-outline-primary">Crear</button>
                        <a href="Crear_viaje.php" class="btn btn-outline-danger">Volver</a>
                    </div>
                    <?php
                        if(!empty($error)){
                            foreach($error as $datos){
                                echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' . $datos . "</div>";
                            }
                        }
                        ?>
                        <?php
    
                    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
                        }else{
                            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                                Acceso no autorizado. <br> 
                                <a href='../../../Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                            </div>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <?php
        require_once("../../../../includes/footer.php");
    ?>
</body>
</html>