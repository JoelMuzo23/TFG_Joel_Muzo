<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="estilos/css_registro.css">
    <title>Registrarse</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">¡Únete a Horizontes!</h1> 
            <!--Parrafo descriptivo-->
            <p>Únete a nuestra comunidad: Regístrate ahora</p>
        </div>
    </div>

    <!--
        Debajo se llamara mostrara un formulario donde el usuario podra registrarse en la agencia  para ello debera de 
        poner sus datos personales, una vez puesto se validara y limpiara y se añadira a la funcion llamada insertarUsuario()
        donde dichos datos se van a añadir a la tabla de usuario.
    -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4 class="subtitulo">¡Introduce tu datos personales! </h4>
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" >
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" >
                    </div>
                    <div class="form-group mt-4">
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Numero de telefono" >
                    </div>
                    <div class="form-group mt-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" >
                    </div>
                    <div class="form-group mt-4">
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña" >
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-outline-dark btn-lg" value="Registrarse">
                        <a class="btn btn-outline-danger btn-lg" href="Inicio.php">Volver</a>
                    </div>
                </form>
                <?php
                function limpiar($valor){
                    $valor = htmlspecialchars($valor);
                    $valor = trim($valor);
                    return $valor;
                }

                if(!empty($_POST["nombre"])){
                    $nombre = limpiar($_POST["nombre"]);
                }else{
                    $error[] = "Por favor, Introduce el nombre";
                }

                if(!empty($_POST["apellido"])){
                    $apellido = limpiar($_POST["apellido"]);
                }else{
                    $error[] = "Por favor, Introduce el apellido";
                }

                if(!empty($_POST["apellido2"])){
                    $apellido2 = limpiar($_POST["apellido2"]);
                }else{
                    $error[] = "Por favor, Introduce el segundo apellido";
                }

                if(!empty($_POST["telefono"])){
                    $telefono = limpiar($_POST["telefono"]);
                }else{
                    $error[] = "Por favor, Introduce el numero de telefono";
                }

                if(!empty($_POST["email"])){
                    $correo = limpiar($_POST["email"]);
                }else{
                    $error[] = "Por favor, Introduce el correo";
                }

                if(!empty($_POST["contra"])){
                    $contraseña = md5(limpiar($_POST["contra"]));
                }else{
                    $error[] = "Por favor, Introduce la contraseña";
                }

                if(!empty($error)){ 
                    foreach($error as $dato){
                        echo '<div class="alert alert-danger mt-3 rounded-pill" role="alert">' .  $dato  . '</div>'; 
                    }
                }else{
                    require_once("Proyecto.php");
                    $insert =  new Proyecto();
                    $insert -> insertarUsuario($nombre, $apellido, $apellido2, $telefono, $correo, $contraseña);
                }
            ?>
            </div>
        </div>
    </div>

    <!-- Parte Inferior de la pagina -->
    <div class="row mt-3">
        <div class="col-md-12">
            <!-- Caja donde va a estar el autor de la página-->
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
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
