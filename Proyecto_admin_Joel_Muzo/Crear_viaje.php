<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/Crear_viaje.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ingresar Viaje</title>
</head>
<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold"> Agregar Nuevo Viaje</h1> 
        </div>
    </div>

    <?php
    /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
        session_start();
        if(isset($_SESSION["nombre"])){
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se mostraran 7 cards con el nombre de las categorias de los
        viajes, dichos cards se usaran para que el admin eliga que tipo de viaje desee creear, por lo que hay un boton para enviar al admin a otra 
        pagina donde va poder introducir los datos del viaje.  
    -->
    <div class="container">
        <h3 class="mb-4 text-center">Selecciona una categoría de viaje</h3>
        <div class="row mt-3">
            <div class="col-md-3 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Ofertas</h5>
                    <div class="card-body text-center">
                        <a href="Ofertas_admin.php" class="btn btn-outline-info">Añadir viaje</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Hoteles</h5>
                    <div class="card-body text-center">
                        <a href="Hoteles_admin.php" class="btn btn-outline-info">Añadir hotel</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Ciudades</h5>
                    <div class="card-body text-center">
                        <a href="Ciudades_admin.php" class="btn btn-outline-info">Añadir ciudad</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Playas</h5>
                    <div class="card-body text-center">
                        <a href="Playa_admin.php" class="btn btn-outline-info">Añadir Cultural</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Cultural</h5>
                    <div class="card-body text-center">
                        <a href="Culturales_admin.php" class="btn btn-outline-info">Añadir crucero</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Cruceros</h5>
                    <div class="card-body text-center">
                        <a href="Cruceros_admin.php" class="btn btn-outline-info">Añadir aventura</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 col-12">
                <div class="card bg-dark text-white">
                    <h5 class="card-header text-center">Aventuras</h5>
                    <div class="card-body text-center">
                        <a href="Aventuras_admin.php" class="btn btn-outline-info">Añadir aventura</a>
                    </div>
                </div>
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
