<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../estilos/AdminMenu.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Menu Administrativo</title>
</head>
<body>
    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Panel de Control Administrativo</h1>
            <!-- Párrafo descriptivo-->
            <p>Gestiona fácilmente el contenido y las configuraciones de tu agencia de viajes</p>
        </div>
    </div>
    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
    session_start();
    if(isset($_SESSION["nombre"])){
    ?> 

    <!-- Si el usuario ha iniciado sesion, se va a mostrar un texto de bienvenida y seguido de dos card de boostrap uno para listar los viajes que hay en la agencia y
        otro para listar los clientes que se han registrado, tambien incluye un boton de cerrar sesion. -->

    <div class="container mt-3">
        <h4> Bienvenido <?= $_SESSION["nombre"] ?> que vamos a hacer hoy </h4> 
        <div class="row mt-3">
            <div class="col-md-3 mt-3 d-flex">
                <div class="card h-100" style="width: 100%;">
                    <h5 class="card-header text-center bg-black text-white">Listar viajes</h5>
                    <div class="card-body">
                        <p class="card-text text-center">Modifica, añade o borra los viajes existente en la agencia</p>
                        <div class="text-center">
                            <a href="acciones/Listado_Viajes.php" class="btn btn-outline-dark">Acceder</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mt-3 d-flex">
                <div class="card h-100" style="width: 100%;">
                    <h5 class="card-header text-center bg-black text-white">Listar clientes</h5>
                    <div class="card-body">
                        <p class="card-text text-center">Listado de todos los cliente de la agencia</p>
                        <div class="text-center">
                            <a href="acciones/Listado_Clientes.php" class="btn btn-outline-dark">Acceder</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mt-3 d-flex">
                <div class="card h-100" style="width: 100%;">
                    <h5 class="card-header text-center bg-black text-white">Listar viajes reservados</h5>
                    <div class="card-body">
                        <p class="card-text text-center">Listado de todos los viajes que estan en reserva</p>
                        <div class="text-center">
                            <a href="acciones/Listado_Viajes_Reservados.php" class="btn btn-outline-dark">Acceder</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mt-3 d-flex">
                <div class="card h-100" style="width: 100%;">
                    <h5 class="card-header text-center bg-black text-white">Listar viajes pagados</h5>
                    <div class="card-body">
                        <p class="card-text text-center">Listado de todos los viajes que estan pagados</p>
                        <div class="text-center">
                            <a href="acciones/Listado_Viajes_Pagados.php" class="btn btn-outline-dark">Acceder</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 mt-3 text-center">
                <a href="acciones/CerrarAdmin.php" class="card-cerrar btn btn-outline-danger btn-block">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <?php
    // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
    } else {
        echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                Acceso no autorizado. <br> 
                <a href='../Login_admin.php'> Por favor, inicia sesión como administrador.</a>
              </div>";
    }
    ?>
   
    <?php
        require_once("../../includes/footer.php");
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
