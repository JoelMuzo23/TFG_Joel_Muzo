<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../../../estilos/Ofertas_form.css">
    <title>Modificar Ofertas</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Modificar Datos de Viajes de Ofertas</h1> 
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
        if(isset($_SESSION["nombre"])){
            require_once("../../../../Proyecto2.php");
            $proyecto = new Proyecto2();
            $id_oferta = isset($_GET["id_oferta"]) ? $_GET["id_oferta"] : null;
            if($id_oferta){
                $mod_ofer = $proyecto -> formularioOfertas($id_oferta); 
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                function limpiar($valor){
                    $valor = htmlspecialchars($valor);
                    $valor = trim($valor);
                    return $valor;
                }  

                if(!empty($_POST["nombre"])){
                    $nombre = limpiar($_POST["nombre"]);
                }else{
                    $error[] = "Por favor,  introduzca el nombre de la oferta";
                }

                if(!empty($_POST["pais"])){
                    $pais = limpiar($_POST["pais"]);
                }else{
                    $error[] = "Por favor,  introduzca el pais de la oferta";
                }

                if(!empty($_POST["descripcion"])){
                    $descripcion = limpiar($_POST["descripcion"]);
                }else{
                    $error[] = "Por favor,  introduzca la descripcion de la oferta";
                }

                if(!empty($_POST["actividad"])){
                    $actividad = limpiar($_POST["actividad"]);
                }else{
                    $error[] = "Por favor,  introduzca la actividad de la oferta";
                }

                if(!empty($_POST["informacion"])){
                    $informacion = limpiar($_POST["informacion"]);
                }else{
                    $error[] = "Por favor,  introduzca la informacion de la oferta";
                }

                if(!empty($_POST["precio"])){
                    $precio = limpiar($_POST["precio"]);
                }else{
                    $error[] = "Por favor,  introduzca el precio de la oferta";
                }

                if(empty($error)){
                    $modificar = new proyecto2();
                    $modificar -> modificarOferta($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $id_oferta);
                }
            }
        
    ?>
    
    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se llama a la funcion llamada formularioOfertas dicha función
        mostrara un formulario donde se va mostrar los datos del viaje de oferta segun su id_ciudad.  
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Modifica los datos del viaje</h1>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . "?id_oferta=" . $id_oferta ?>" method="post">
                    <div class="form-group mt-4">
                        <label for="nombre">Modifica el nombre del viaje </label> 
                        <input  type="text" class="form-control" id="nombre" name="nombre" placeholder=" <?=$mod_ofer["nombre"]?>">
                    </div>

                    <div class="form-group mt-4">
                        <label for="pais">Modifica el nombre del pais </label> 
                        <input  type="text" class="form-control" id="pais" name="pais" placeholder=" <?=$mod_ofer["pais"]?>">
                    </div> 

                    <div class="form-group mt-4">
                        <label for="descripcion">Modifica la descripcion de la oferta </label> 
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"> <?=$mod_ofer["descripcion"]?> </textarea>
                    </div> 

                    <div class="form-group mt-4">
                        <label for="actividad">Modifica las actividades de la oferta </label> 
                        <textarea class="form-control" name="actividad" id="actividad" rows="2"> <?=$mod_ofer["actividad"]?> </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="informacion">Modifica la informacion de la oferta </label> 
                        <textarea class="form-control" name="informacion" id="informacion" rows="4"> <?=$mod_ofer["informacion"]?> </textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="precio">Modifica el precio del pais </label> 
                        <input  type="number" class="form-control" id="precio" name="precio" placeholder=" <?=$mod_ofer["precio"]?> ">
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