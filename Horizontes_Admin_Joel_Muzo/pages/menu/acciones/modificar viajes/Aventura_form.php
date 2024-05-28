<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../estilos/Aventura_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Modificar Aventural</title>
</head>
<body>
    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Modificar Datos de las aventuras</h1> 
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
        if(isset($_SESSION["nombre"])){
            require_once("../../../../Proyecto2.php");
            $proyecto = new Proyecto2();
            $id_aventura = isset($_GET["id_aventura"]) ? $_GET["id_aventura"] : null;
            if($id_aventura){
                $mod_ave = $proyecto -> formularioAventura($id_aventura); 
            
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

                if(!empty($_POST["actividades"])){
                    $actividades = limpiar($_POST["actividades"]);
                }else{
                    $error[] = "Por favor,  introduzca las actividades de la aventura";
                }

                if(!empty($_POST["nivel"])){
                    $nivel = limpiar($_POST["nivel"]);
                }else{
                    $error[] = "Por favor,  introduzca el nivel de la aventura";
                }

                if(!empty($_POST["informacion"])){
                    $informacion = limpiar($_POST["informacion"]);
                }else{
                    $error[] = "Por favor,  introduzca la informacion de la aventura";
                }

                if(!empty($_POST["precio"])){
                    $precio = limpiar($_POST["precio"]);
                }else{
                    $error[] = "Por favor,  introduzca el precio de la aventura";
                }

                if(empty($error)){
                    $modificar = new proyecto2();
                    $modificar -> modificarAventura($nombre, $ubicacion, $actividades, $nivel, $informacion, $precio, $id_aventura);
                }
            }
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se llama a la funcion llamada formularioAventura dicha función
        mostrara un formulario donde se va mostrar los datos del viaje de aventura segun su id_aventura.  
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Modifica Datos de la aventura</h1>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . "?id_aventura=" . $id_aventura ?>" method="post">
                    <div class="form-group mt-4">
                        <label for="nombre">Modifica el nombre de la aventura </label> 
                        <input  type="text" class="form-control" id="nombre" name="nombre" placeholder=" <?=$mod_ave["nombre"]?>">
                    </div>

                    <div class="form-group mt-4">
                        <label for="ubicacion">Modifica la ubicacion de la aventura </label> 
                        <input  type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder=" <?=$mod_ave["ubicacion"]?> ">
                    </div> 


                    <div class="form-group mt-4">
                        <label for="actividades">Modifica la actividades de la aventura </label> 
                        <textarea class="form-control" name="actividades" id="actividades" rows="2"> <?=$mod_ave["actividades"]?> </textarea>
                    </div> 

                    <div class="form-group mt-4">
                        <label for="nivel">Modifica el nivel de la aventura </label> 
                        <input  type="text" class="form-control" id="nivel" name="nivel" placeholder=" <?=$mod_ave["nivel"]?> ">
                    </div> 

                    <div class="form-group mt-4">
                        <label for="informacion">Modifica la informacion de la aventura </label> 
                        <textarea class="form-control" name="informacion" id="informacion" rows="4"> <?=$mod_ave["informacion"]?> </textarea>
                    </div> 

                    <div class="form-group mt-4">
                        <label for="precio">Modifica el precio del viaje </label> 
                        <input  type="number" class="form-control" id="precio" name="precio" placeholder=" <?=$mod_ave["precio"]?> ">
                    </div> 
                    
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-outline-primary">Modificar</button>
                        <a href="../Listado_Viajes.php" class="btn btn-outline-danger">Volver</a>
                    </div>
                <form>
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