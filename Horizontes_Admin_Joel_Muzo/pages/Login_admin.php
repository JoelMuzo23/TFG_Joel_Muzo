<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../estilos/Login_admin.css">
    <title>Inicio de sesión administrador</title>
</head>
<?php
session_start();
?>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">¡Portal de Administradores! </h1>
            <!--Parrafo descriptivo-->
            <p">Inicia sesión para acceder al panel de administración</p>
        </div>
    </div>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se mostrara un formulario para insertar el correo y la contraseña,
        la cual se va a validar y comprobar que en la base de datos existe, si existe inicia sesion y si no mostrara error.
    -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2><u>Inicia Sesión</u></h2>
                <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <div class="mt-3">
                        <label for="correo" class="form-label">Introduce tu correo electrónico</label>
                        <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="mt-3">
                        <label for="contraseña" class="form-label">Introduce tu contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-dark mt-3">Entrar</button>
                    </div>
                </form>
                <?php
                    function Limpiar($valor){
                        $valor = htmlspecialchars($valor);
                        $valor = trim($valor);
                        return $valor;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(!empty($_POST["correo"])){
                            $correo = Limpiar($_POST["correo"]);
                        }else{
                            $error[] = "Porfavor introduzca su correo";
                        }

                        if(!empty($_POST["contraseña"])){
                            $contraseña = Limpiar($_POST["contraseña"]);
                        }else{
                            $error[] = "Porfavor introduzca su contraseña";
                        }

                        if(!empty($error)){
                            foreach($error as $datos){
                                echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' . $datos . "</div>";
                            }
                        }else{
                            require_once("../Proyecto2.php");
                            $ad = new Proyecto2();
                            $ad -> loginAdmin($correo, $contraseña);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
    <?php
        require_once("../includes/footer.php");
    ?>
</body>
</html>
