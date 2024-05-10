<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/Ofertas_admin.css">
    <title>Admin Ofertas</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold"> Ofertas de Viajes</h1> 
            <!--Encabezado secundario del fondo--> 
            <h3 class="display-8 fw-bold">Ofertas de Viajes: Administración Central</h3>
        </div>
    </div>
    
    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
    if(isset($_SESSION["nombre"])){
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se mostrara un formulario para insertar un nuevo viaje de la tematica de oferta,
        este formulario se valida y se limpia de caracteres malisiosos y seguido dichos valores introducidos por el admin se agregaran a la funcion insertarViajeOf(),
        que basicamente va a insertar dicho viaje a la base de datos.
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            <h2>Introduce los datos del viaje</h2>
                <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mt-4">
                        <label for="nombre">Introduce el nombre de la ciudad</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($_POST["nombre"] ?? '')?>">  
                    </div>
                    <div class="form-group mt-3">
                        <label for="pais">Introduce el nombre del pais</label>
                        <input type="text" class="form-control" id="pais" name="pais" value="<?= htmlspecialchars($_POST["pais"] ?? '')?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="descripcion">Introduce una descripción del viaje</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($_POST["descripcion"] ?? '') ?></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="actividad">Introduce la actividad del viaje</label>
                        <textarea class="form-control" id="actividad" name="actividad" rows="2"><?= htmlspecialchars($_POST["actividad"] ?? '')?></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="informacion">Introduce la informacion del viaje</label>
                        <textarea class="form-control" id="informacion" name="informacion" rows="2"><?= htmlspecialchars($_POST["informacion"] ?? '')?></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="precio">Introduce el precio del viaje</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($_POST["precio"] ?? '')?>">
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-3">
                        <label for="imagen">Inserta la imagen del viaje</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>

                    <div class="form-group mt-3">
                        <label for="imagen">Inserta tres imagenes mas para el viaje</label>
                        <input type="file" class="form-control mt-2" id="imagen1" name="imagen1">
                        <input type="file" class="form-control mt-2" id="imagen2" name="imagen2">
                        <input type="file" class="form-control mt-2" id="imagen3" name="imagen3">
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    <?php
                    
                        function limpiar($valor){
                            $valor = htmlspecialchars($valor);
                            $valor = trim($valor);
                            return $valor;
                        }  

                        if(!empty($_POST["nombre"])){
                            $nombre = limpiar($_POST["nombre"]);
                        }else{
                            $error[] = "Por favor,  introduzca el nombre de la ciudad";
                        }

                        if(!empty($_POST["pais"])){
                            $pais = limpiar($_POST["pais"]);
                        }else{
                            $error[] = "Por favor,  introduzca el nombre del pais";
                        }

                        if(!empty($_POST["descripcion"])){
                            $descripcion = limpiar($_POST["descripcion"]);
                        }else{
                            $error[] = "Por favor, introduzca una descripcion";
                        }

                        if(!empty($_POST["actividad"])){
                            $actividad = limpiar($_POST["actividad"]);
                        }else{
                            $error[] = "Por favor, introduzca una actividad";
                        }

                        if(!empty($_POST["informacion"])){
                            $informacion = limpiar($_POST["informacion"]);
                        }else{
                            $error[] = "Por favor, introduzca la informacion";
                        }

                        if(!empty($_POST["precio"])){
                            $precio = limpiar($_POST["precio"]);
                        }else{
                            $error[] = "Por favor, introduzca una precio";
                        }

                        if(!empty($_FILES["imagen"]["name"]) && !empty($_FILES["imagen1"]["name"]) && !empty($_FILES["imagen2"]["name"]) && !empty($_FILES["imagen3"]["name"])){
                            $imagen = $_FILES["imagen"]["tmp_name"];
                            $imagen1 = $_FILES["imagen1"]["tmp_name"];
                            $imagen2 = $_FILES["imagen2"]["tmp_name"];
                            $imagen3 = $_FILES["imagen3"]["tmp_name"];
                            $imagen_oferta = file_get_contents($imagen);
                            $imagen_oferta1 = file_get_contents($imagen1);
                            $imagen_oferta2 = file_get_contents($imagen2);
                            $imagen_oferta3 = file_get_contents($imagen3);
                        }else{
                            $error[] = "Por favor, introduzca las imágenes del hotel";
                        }
                    
                        if(!empty($error)){
                            foreach($error as $datos){
                                echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' . $datos . "</div>";
                            }
                        }else{
                            require_once("Proyecto2.php");
                            $insertar = new proyecto2();
                            $insertar -> insertarViajeOf($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $imagen_oferta, $imagen_oferta1, $imagen_oferta2, $imagen_oferta3);
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
        }else{
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                Acceso no autorizado. <br> 
                <a href='Login_admin.php'> Por favor, inicia sesión como administrador.</a>
              </div>";
        }
    ?>

    <!-- Parte Inferior de la pagina -->
    <div class="row mt-3">
        <div class="col-md-12">

        <!-- Caja donde va ha estar el autor de la pagina-->
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
</body>
</html>