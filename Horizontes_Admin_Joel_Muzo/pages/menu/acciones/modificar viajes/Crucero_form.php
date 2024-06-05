<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../../../estilos/Crucero_form.css">
    <title>Modificar Cruceros</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Modificar Datos del crucero</h1> 
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
        if(isset($_SESSION["nombre"])){
            require_once("../../../../Proyecto2.php");
            $proyecto = new Proyecto2();
            $id_crucero = isset($_GET["id_crucero"]) ? $_GET["id_crucero"] : null;
            if($id_crucero){
                $mod_cru = $proyecto -> formularioCrucero($id_crucero); 
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                function limpiar($valor){
                    $valor = htmlspecialchars($valor);
                    $valor = trim($valor);
                    return $valor;
                }

                if(!empty($_POST["nombre"])){
                    $nombre = limpiar($_POST["nombre"]);
                }else{
                    $error[] = "Por favor,  introduzca el nombre del crucero";
                }

                if(!empty($_POST["salida"])){
                    $salida = limpiar($_POST["salida"]);
                }else{
                    $error[] = "Por favor,  introduzca la salida del crucero";
                }

                if(!empty($_POST["descripcion"])){
                    $descripcion = limpiar($_POST["descripcion"]);
                }else{
                    $error[] = "Por favor,  introduzca la descripcion del crucero";
                }

                if(!empty($_POST["actividad"])){
                    $actividad = limpiar($_POST["actividad"]);
                }else{
                    $error[] = "Por favor,  introduzca la actividad del crucero";
                }

                if(!empty($_POST["informacion"])){
                    $informacion = limpiar($_POST["informacion"]);
                }else{
                    $error[] = "Por favor,  introduzca la informacion del crucero";
                }

                if(!empty($_POST["precio"])){
                    $precio = limpiar($_POST["precio"]);
                }else{
                    $error[] = "Por favor,  introduzca el precio del crucero";
                }

                if(empty($error)){
                    $modificar = new proyecto2();
                    $modificar -> modificarCrucero($nombre, $salida, $descripcion, $actividad, $informacion, $precio, $id_crucero);
                }
            }
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se llama a la funcion llamada formularioCrucero dicha función
        mostrara un formulario donde se va mostrar los datos del viaje de cruceros segun su id_crucero.  
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Modifica Datos del crucero</h1>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . "?id_crucero=" . $id_crucero ?>" method="post">
                    <div class="form-group mt-4">
                        <label for="nombre">Modifica el nombre del crucero </label> 
                        <input  type="text" class="form-control" id="nombre" name="nombre" placeholder=" <?=$mod_cru["nombre"]?> ">
                    </div>

                    <div class="form-group mt-4">
                        <label for="salida">Modifica la salida del crucero </label> 
                        <input  type="text" class="form-control" id="salida" name="salida" placeholder=" <?=$mod_cru["salida"]?> ">
                    </div> 

                    <div class="form-group mt-4">
                        <label for="descripcion">Modifica la descripcion del crucero </label> 
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"> <?=$mod_cru["descripcion"]?> </textarea>
                    </div> 

                    <div class="form-group mt-4">
                        <label for="actividad">Modifica las actividades del crucero </label> 
                        <textarea class="form-control" name="actividad" id="actividad" rows="2"> <?=$mod_cru["actividad"]?> </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="informacion">Modifica la informacion del crucero </label> 
                        <textarea class="form-control" name="informacion" id="informacion" rows="4"> <?=$mod_cru["informacion"]?> </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="precio">Modifica el precio del viaje </label> 
                        <input  type="number" class="form-control" id="precio" name="precio" placeholder=" <?=$mod_cru["precio"]?>">
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
                    echo "<div class='alert alert-danger mt-3 rounded-pill' role='alert'>" . $datos ."</div>";
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