<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../estilos/css_login.css">
    <title>Inicia Sesión</title>
</head>
<body>

     <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">¡Bienvenido de vuelta! </h1>
            <!--Parrafo descriptivo-->
            <p>Inicia sesión para continuar</p>
        </div>
    </div>

    <!-- 
        Debajo se mostrara un texto descriptivo y seguido se mostrara un formulario donde el usuario podra introducir su correo y su 
        contraseña dichos datos son validados y limpiados de caracteres malisioso, dichos datos son añadidos a la funcion loginUsuario()
        donde si comprobara si ese correo y contraseña existe por lo que podra iniciar sesion y si no tiene cuenta hay un enlace donde 
        podra registrarse.
    -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4 class="subtitulo">¡Introduce tu correo y contraseña </h4>
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class="form-group mt-4">
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico">
                    </div>
                    <div class="form-group mt-4">
                        <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña">
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-outline-dark btn-lg" value="Acceder">
                        <a class=" btn btn-outline-danger btn-lg" href="Inicio.php">Volver</a>
                    </div>
                </form>
                <h5 class="text-center mb-4 mt-4">¿No tienes una cuenta? <a href="Registro.php" class="text-primary">Regístrate aquí</a></h5>
                    <?php
                    session_start();

                    // Función para limpiar los datos del formulario
                    function limpiar($valor)
                    {
                        $valor = htmlspecialchars($valor);
                        $valor = trim($valor);
                        return $valor;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Validar y limpiar los datos del formulario
                        if (!empty($_POST["correo"])) {
                            $correo = limpiar($_POST["correo"]);
                        } else {
                            $error[] = "Por favor, Introduce el correo";
                        }

                        if (!empty($_POST["contraseña"])) {
                            $contraseña = limpiar($_POST["contraseña"]);
                        } else {
                            $error[] = "Por favor, Introduce la contraseña";
                        }

                        // Si no hay errores, verificar las credenciales y redirigir si son válidas
                        if (!empty($error)) {
                            foreach ($error as $datos) {
                                echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' . $datos ."</div>";
                            }
                        } else {
                            require_once "../Proyecto.php";
                            $login = new Proyecto();
                            $login->loginUsuario($correo, $contraseña);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once("../includes/footer.php");
    ?>
</body>
</html>
