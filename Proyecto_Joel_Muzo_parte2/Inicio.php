<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_inicio.css">
    <title>Inicio</title>
</head>
<body>
    <!-- Encabezado de la pagina inicial -->
    <nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">

        <!-- Logo del Encabezado -->
        <img class="logo" src="img/Logo.png" alt="">

        <!-- Boton para el Desplegable del Menu -->
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu de la Pagina con una comprobacion si se ha iniciado sesion o no  -->
        <div class="collapse navbar-collapse justify-content-end ml-3" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <div class="boton"> <a class="nav-link" aria-current="page" href="Ofertas.php">Ofertas</a> </div>
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
                                    <div class="boton_desple"> <a class="dropdown-item" href="Historial.php">Mis Reservas</a> </div> 
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


      <!-- Parte Superior de la pagina inicial -->
        <div class="margen">
            <div class="row">

                <!-- Parte de la Imagen y texto y boton -->
                <div class="image-container">
                    <div class="image-overlay">
                        <h3>Necesitas una pausa, necesitas</h3>
                        <h1>VIAJAR</h1>
                       <div class="boton2"><a class="nav-link" aria-current="page" href="Viajes.php"><h5>Ver Viajes</h5></a> </div>
                    </div>
                       <img class="img-fluid " src="img/Imagen1.jpg" alt="Imagen 1">
                </div>
            </div>
        </div>

        <!-- Parte Media de la pagina Inicial-->
        <div class="row mt-3">

            <!-- Descripcion sobre la empresa Horizontes-->
            <div class="col-md-5 col-12">
                <div class="container">
                    <div class="caja_pre">
                        <h1>¿Quienes somos?</h1>
                        <hr>
                        <p class="texto">Somos una empresa de gestión de viajes, que organizamos viajes para todo el publico, ofrecemos ayuda y descuento a un grupo de personas: ancianas, colegios, o personas con discapacidad.
                            Los viajes que ofrecemos son muy variados, desde viajes a otras ciudades, como al mismo espacio, los transportes que requerimos son: autocares, trenes, aviones, barcos y naves espaciales. 
                            Te ofrecemos dos tipos de viajes el normal o Premium, cada uno dispone de distintas cosas, el Premium, ofrece una estancia en hoteles de 5 estrellas, cuyos restaurantes poseen los platos más suculentos</p>
                    </div>
                </div>
            </div>

            <!-- Carrusel de fotos decorativas de la pagina -->
            <div class="col-md-7 col-12">
                <div class="container ">
                    <div class="carousel slide carousel-white mt-3" id="imagen1">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1493514789931-586cb221d7a7?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGNpdWRhZCUyMG9zY3VyYXxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                        
                            <div class="carousel-item" >
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1544259342-306eccfec481?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y2l1ZGFkJTIwb3NjdXJhfGVufDB8fDB8fHww" alt="">
                            </div>
    
                            <div class="carousel-item">
                                <img class="img-fluid" src="https://plus.unsplash.com/premium_photo-1669927131902-a64115445f0f?q=80&w=1175&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                            </div>

                            <div class="carousel-item">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1544411047-c491e34a24e0?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imagen1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
    
                        <button class="carousel-control-next" type="button" data-bs-target="#imagen1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
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
