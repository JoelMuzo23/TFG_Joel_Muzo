<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../estilos/Aventuras_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Aventuras Admin</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Viajes de aventuras </h1> 
            <!--Encabezado secundario del fondo-->
            <h3 class="display-8 fw-bold">Viajes de aventuras: Administración Central</h3>
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
                    $error[] = "Por favor,  introduzca el nombre de la aventura";
                }

                if(!empty($_POST["ubicacion"])){
                    $ubicacion = limpiar($_POST["ubicacion"]);
                }else{
                    $error[] = "Por favor,  introduzca la ubicacion de la aventura";
                }

                if(!empty($_POST["nivel"])){
                    $nivel = limpiar($_POST["nivel"]);
                }else{
                    $error[] = "Por favor,  introduzca el nivel de la aventura";
                }

                if(!empty($_POST["informacion"])){
                    $informacion = limpiar($_POST["informacion"]);
                }else{
                    $error[] = "Por favor, introduzca la informacion de la aventura";
                }

                if(!empty($_POST["precio"])){
                    $precio = limpiar($_POST["precio"]);
                }else{
                    $error[] = "Por favor, introduzca una precio de la aventura";
                }
                
                if(!empty($_FILES["imagen"]["name"]) && !empty($_FILES["imagen1"]["name"]) && !empty($_FILES["imagen2"]["name"]) && !empty($_FILES["imagen3"]["name"])){
                    $imagen = $_FILES["imagen"]["tmp_name"];
                    $imagen1 = $_FILES["imagen1"]["tmp_name"];
                    $imagen2 = $_FILES["imagen2"]["tmp_name"];
                    $imagen3 = $_FILES["imagen3"]["tmp_name"];
                    $imagen_aventura = file_get_contents($imagen);
                    $imagen_aventura1 = file_get_contents($imagen1);
                    $imagen_aventura2 = file_get_contents($imagen2);
                    $imagen_aventura3 = file_get_contents($imagen3);
                }else{
                    $error[] = "Por favor, introduzca las imágenes del hotel";
                }

                if(empty($error)){
                    require_once("../../../../Proyecto2.php");
                    $insertar = new proyecto2();
                    $insertar -> insertarViajeAve($nombre, $ubicacion, $actividad, $nivel,  $informacion,  $precio, $imagen_aventura, $imagen_aventura1, $imagen_aventura2, $imagen_aventura3);
                }
            }
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se mostrara un formulario para insertar un nuevo viaje de la tematica de aventuras,
        este formulario se valida y se limpia de caracteres malisiosos y seguido dichos valores introducidos por el admin se agregaran a la funcion insertarViajeAve(),
        que basicamente va a insertar dicho viaje a la base de datos.
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Introduce los datos del viaje de aventuras</h2>
                <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Introduce el nombre de la aventura </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($_POST["nombre"] ?? '')?>">
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Introduce la ubicacion de la aventura </label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?= htmlspecialchars($_POST["ubicacion"] ?? '')?>">
                    </div>
                    <div class="form-group">
                        <label for="actividades">Introduce las actividades de la aventura </label>
                        <textarea class="form-control" id="actividades" name="actividades" rows="3"><?= htmlspecialchars($_POST["actividades"] ?? '')?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nivel">Introduce el nivel de la  aventura </label>
                        <input type="number" class="form-control" id="nivel" name="nivel" value="<?= htmlspecialchars($_POST["nivel"] ?? '')?>">
                    </div>
                    <div class="form-group">
                        <label for="informacion">Introduce la informacion la aventura </label>
                        <textarea class="form-control" id="informacion" name="informacion" rows="3"><?= htmlspecialchars($_POST["informacion"] ?? '')?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Introduce el precio de la aventura</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($_POST["precio"] ?? '')?>">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="imagen">Inserta la imagen de la aventura</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>

                    <div class="form-group mt-3">
                        <label for="imagen">Inserta tres imagenes mas para el viaje</label>
                        <input type="file" class="form-control mt-2" id="imagen1" name="imagen1">
                        <input type="file" class="form-control mt-2" id="imagen2" name="imagen2">
                        <input type="file" class="form-control mt-2" id="imagen3" name="imagen3">
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