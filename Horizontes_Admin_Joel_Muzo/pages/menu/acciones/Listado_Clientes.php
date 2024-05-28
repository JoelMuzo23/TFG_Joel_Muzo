<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../estilos/Clientes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Listado de clientes</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold"> Listar Clientes</h1> 
            <!--Encabezado secundario del fondo-->
            <h3 class="display-8 fw-bold">Herramientas de Administración</h3>
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
        session_start();
        if(isset($_SESSION["nombre"])){
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se llama a la funcion llamada listarUsuarios dicha función
        mostrara el listado de todos los clientes mostrando su nombre, apellido, correo, telefono y un boton de tal forma que si el admin da a dicho boton
        se borrara el cliente.  
    -->
    <div class='container mt-3'>
        <h1 class='text-center'>Listado Clientes</h1>
        <div class='row mt-4'>
            <div class='col-md-10 offset-md-1'>
                <?php
                    require_once("../../../Proyecto2.php");
                    $cli = new Proyecto2();
                    $cli -> listarUsuarios();
                ?>
                <div class="text-center mt-3">
                    <a href="../AdminMenu.php" class="btn btn-outline-danger">Volver</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
        }else{
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                    Acceso no autorizado. <br> 
                    <a href='../../Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                </div>";
        }
    ?>

    <?php
        require_once("../../../includes/footer.php");
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>