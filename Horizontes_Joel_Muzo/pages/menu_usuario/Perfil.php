<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/css_perfil.css">
    <title>MI Perfil</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1>¡Dale Vida a tu Perfil!</h1>
            <!--Parrafo descriptivo-->
            <p>En esta página puedes editar tu información personal.</p>
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
        session_start();
        if(isset($_SESSION["nombre"])){
        $id = $_SESSION["id"];
        require_once("../../Proyecto.php");
        $proyecto = new Proyecto();
        $datos = $proyecto -> datosUsuario($id);
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido mostrara un formulario donde el usuario podra modificar
        sus datos, una vez el usuario lo modifique se limpiara de caracteres malisiosos y se añadira a la funcion llamada modificarUsuario(), 
        dicha funcion recoge los datos y los modifica con los que estan en la base de datos mediante su id.
    -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                    <h4 class="subtitulo">¡Bienvenido, <?=$_SESSION["nombre"] . " " . $_SESSION["apellido"]?>! </h4>

                    <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$datos["nombre"] ?>"> 
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?=$datos["apellido"] ?>"> 
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?=$datos["apellido2"] ?>"> 
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="correo" name="correo" value="<?=$datos["correo"] ?>" disabled> 
                        </div>
                        <div class="form-group mt-4">
                            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña"><br>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-outline-dark" value="Modificar">
                            <a class="btn btn-outline-danger" href="../Inicio.php">Volver</a>
                        </div>
                    </form>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        function limpiar($valor){
                            $valor = htmlspecialchars($valor);
                            $valor = trim($valor);
                            return $valor;
                        }

                        $id = $_SESSION["id"];

                        if(!empty($_POST["nombre"])){
                            $nombre = limpiar($_POST["nombre"]);
                        }

                        if(!empty($_POST["apellido"])){
                            $apellido = limpiar($_POST["apellido"]);
                        }

                        if(!empty($_POST["apellido2"])){
                            $apellido2 = limpiar($_POST["apellido2"]);
                        }

                        if(!empty($_POST["contraseña"])){
                            $contraseña = limpiar($_POST["contraseña"]);
                            $contraseña = md5($contraseña);
                        }else{
                            $error[] = "Por favor, Introduzca la contraseña";
                        }

                        if(!empty($error)){
                            foreach($error as $datos){
                                echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' .  $datos  . '</div>'; 
                            }
                        }else{
                            require_once("../../Proyecto.php");
                            $actualizar = new Proyecto();
                            $actualizar -> modificarUsuario($id, $nombre, $apellido, $apellido2, $contraseña);
                        }
                    }
                    ?>
            </div>
        </div>
    </div>

    <?php
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
        }else{
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                Acceso no autorizado. <br> 
                <a href='../Login.php'> Por favor, inicia sesión.</a>
              </div>";
        }
    ?>

    <?php
        require_once("../../includes/footer.php");
    ?>
</body>
</html>
