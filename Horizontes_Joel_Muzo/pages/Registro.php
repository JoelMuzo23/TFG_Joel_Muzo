<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="../estilos/css_registro.css">
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
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= htmlspecialchars($_POST["nombre"] ?? '')?>">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?= htmlspecialchars($_POST["apellido"] ?? '')?>">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" value="<?= htmlspecialchars($_POST["apellido2"] ?? '')?>">
                    </div>
                    <div class="form-group mt-4">
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Numero de telefono" value="<?= htmlspecialchars($_POST["telefono"] ?? '')?>" >
                    </div>
                    <div class="form-group mt-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="<?= htmlspecialchars($_POST["email"] ?? '')?>" >
                    </div>
                    <div class="form-group mt-4">
                        <input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña" value="<?= htmlspecialchars($_POST["contra"] ?? '')?>" >
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-outline-dark btn-lg" value="Registrarse">
                        <a class="btn btn-outline-danger btn-lg" href="Inicio.php">Volver</a>
                    </div>
                </form>
                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                        if(!preg_match('/^[0-9]{9}$/', $telefono)){
                            $error[] = "El número de teléfono debe contener 9 dígitos.";
                        }
                    }else{
                        $error[] = "Por favor, Introduce el numero de telefono";
                    }

                    if(!empty($_POST["email"])){
                        $correo = limpiar($_POST["email"]);
                        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                            $error[] = "Correo electrónico no válido.";
                        }
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
                        require_once("../Proyecto.php");
                        $insert =  new Proyecto();
                        $insert -> insertarUsuario($nombre, $apellido, $apellido2, $telefono, $correo, $contraseña);
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
