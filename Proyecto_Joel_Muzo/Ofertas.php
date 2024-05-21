<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_ofertas.css">
    <title>Ofertas</title>
</head>
<body>
    <!-- Encabezado de la página inicial -->
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">

            <!-- Logo del Encabezado -->
            <img class="logo" src="img/Logo.png" alt="">

            <!-- Boton para el Desplegable del Menu -->
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de la Pagina con una comprobacion si se ha iniciado sesion o no  -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Inicio.php">Inicio</a> </div>
                    </li>
                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Viajes.php">Viajes</a> </div>
                    </li>
                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Hoteles.php">Hoteles</a> </div>
                    </li>

                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Galeria.php">Galeria</a> </div>
                    </li>

                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Blog.php">Blog</a> </div>
                    </li>
                    <?php
                    session_start();

                    if (
                        isset($_SESSION["nombre"]) &&
                        isset($_SESSION["apellido"])
                    ) {
                        echo '
                        <li class="nav-item dropdown">
                            <div class="boton" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <a class="nav-link" aria-current="page" href="#">' .
                            $_SESSION["nombre"] .
                            " " .
                            $_SESSION["apellido"] .
                            '</a>
                            </div>
                            <ul class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
                                
                                <li class="nav-item">
                                    <div class="boton_desple"> <a class="dropdown-item" href="Perfil.php">Mi Perfil</a> </div> 
                                </li>

                                <li class="nav-item">
                                    <div class="boton_desple"> <a class="dropdown-item" href="Mis_reservas.php">Mis Reservas</a> </div> 
                                </li>

                                <li class="nav-item">
                                    <div class="boton_desple"> <a class="dropdown-item" href="Comentario.php">Añadir <br> Comentario</a> </div> 
                                </li>

                                <li class="nav-item">
                                    <div class="boton_desple"> <a class="dropdown-item" href="Mis_comentarios.php">Mis <br> Comentario</a> </div> 
                                </li>

                                <li class="nav-item">
                                    <div class="boton_cerrar"> <a class="dropdown-item" href="Cerrar.php">Cerrar</a> </div> 
                                </li>

                            </ul>
                        </li>
                    ';
                    } else {
                        echo '<li class="nav-item">
                            <div class="boton"> <a class="nav-link" aria-current="page" href="Login.php">Iniciar Sesión</a> </div>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página -->
    <div class="container mt-5">

        <!-- Texto Descriptivo  -->
        <h1 class="text-center mb-5">"¡Descubre Nuestras Ofertas Exclusivas para Viajar!"</h1>

        <!-- Tarjetas de los diferentes viajes --> 
        <div class="row">
            <?php
                require_once('Proyecto.php');
                $ofertas = new Proyecto();
                $ofertas -> listarOfertas();
            ?>
        </div>
    </div>

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
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

