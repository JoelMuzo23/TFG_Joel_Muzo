<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_viajes.css">
    <title>Viajes</title>
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
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Inicio.php">Inicio</a> </div>
                    </li>

                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Ofertas.php">Ofertas</a> </div>
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
    
    <!-- Cajas mostrando los viajes a las cuidades -->
    <div class="container mt-5">
        <h1 class="text-center mb-5">"Horizontes: Explora el Mundo con Nosotros"</h1>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-5 col-12">
                    <img src="https://p4.wallpaperbetter.com/wallpaper/941/973/233/new-york-desktop-backgrounds-wallpaper-preview.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-7 col-12">
                    <div class="card-body mt-4">
                        <h1 class="card-title text-white text-center">Ciudades</h1>
                        <p class="card-text text-center text-white">Descubre la magia de las ciudades: sumérgete en la bulliciosa vida urbana, maravíllate con su arquitectura icónica y saborea la deliciosa gastronomía local. Explora callejones históricos, admira monumentos emblemáticos.</p>
                        <div class="boton1 text-center"><a class="nav-link" href="Ciudades.php">Ver más</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cajas mostrando los viajes a las playas -->
    <div class="container mt-5">
        <div class="caja1">
            <div class="row no-gutters">
                <div class="col-md-7 col-12">
                    <div class="card-body mt-5">
                        <h1 class="card-title text-black text-center">Playas</h1>
                        <p class="card-text text-center text-black">Sumérgete en el paraíso con nuestros viajes a las mejores playas del mundo. Disfruta del sol, la arena y el mar cristalino mientras te relajas en el entorno natural más espectacular. Relájate bajo una palmera con una bebida refrescante.</p>
                        <div class="boton1 text-center"><a class="nav-link" href="Playas.php">Ver más</a></div>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <img src="https://i.pinimg.com/736x/b9/50/92/b950925cba59194ffa34d323e60e4b5c.jpg" class="card-img" alt="...">
                </div>
            </div>
        </div>
    </div>

    <!-- Cajas mostrando los viajes a las espaciales -->
    <div class="container mt-5">
        <div class="caja2">
            <div class="row no-gutters">
                <div class="col-md-5 col-12">
                    <img src="https://www.elsoldepuebla.com.mx/doble-via/ciencia/1b3u59-la-tecnologia-de-observacion-espacial-ha-arrojado-datos-relevantes-sobre-el-planeta-en-el-que-habitamos-los-cuales-han-permitido-tomar-decisiones-para-mejorar-la-calidad-de-vida.jpg/ALTERNATES/LANDSCAPE_1140/La%20tecnolog%C3%ADa%20de%20observaci%C3%B3n%20espacial%20ha%20arrojado%20datos%20relevantes%20sobre%20el%20planeta%20en%20el%20que%20habitamos,%20los%20cuales%20han%20permitido%20tomar%20decisiones%20para%20mejorar%20la%20calidad%20de%20vida.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-7 col-12">
                    <div class="card-body mt-4">
                        <h1 class="card-title text-white text-center">Espaciales</h1>
                        <p class="card-text text-center text-white">Embárcate en la aventura de una vida con nuestros emocionantes viajes espaciales. Descubre los misterios del universo mientras te elevas hacia las estrellas. Experimenta la ingravidez, contempla la belleza de la Tierra desde el espacio .</p>
                        <div class="boton1 text-center"><a class="nav-link" href="Planetas.php">Ver más</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cajas mostrando los viajes a las cruceros -->
    <div class="container mt-5">
        <div class="caja3">
            <div class="row no-gutters">
                <div class="col-md-7 col-12">
                    <div class="card-body mt-5">
                        <h1 class="card-title text-white text-center">Cruceros</h1>
                        <p class="card-text text-center text-white">Explora el mundo a bordo de nuestros lujosos cruceros y sumérgete en una experiencia inolvidable. Navega por aguas cristalinas mientras visitas destinos exóticos y emocionantes. Disfruta de una gastronomía excepcional, todo ello mientras te relajas con vistas panorámicas del océano. </p>
                        <div class="boton1 text-center"><a class="nav-link" href="Cruceros.php">Ver más</a></div>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <img src="https://fotografias.larazon.es/clipping/cmsimages02/2019/11/11/3E848288-3FAB-4D6D-BCB9-1F93C6CCF3C7/98.jpg?crop=5616,3160,x0,y292&width=1900&height=1069&optimize=low&format=webply" class="card-img" alt="...">
                </div>
            </div>
        </div>
    </div>

    <!-- Cajas mostrando los viajes a las culturales -->
    <div class="container mt-5">
        <div class="caja4">
            <div class="row no-gutters">
                <div class="col-md-5 col-12">
                    <img src="https://c4.wallpaperflare.com/wallpaper/827/515/785/arte-cuadros-esculturas-interior-wallpaper-preview.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-7 col-12">
                    <div class="card-body mt-4">
                        <h1 class="card-title text-white text-center">Culturales</h1>
                        <p class="card-text text-center text-white">Embárcate en un viaje lleno de descubrimientos culturales mientras exploras los tesoros del mundo. Sumérgete en la historia, el arte,  cada paso te lleva a un nuevo entendimiento y apreciación de la belleza y la diversidad del mundo que nos rodea.</p>
                        <div class="boton1 text-center"><a class="nav-link" href="Culturales.php">Ver más</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cajas mostrando los viajes a las aventuras -->
    <div class="container mt-5">
        <div class="caja5">
            <div class="row no-gutters">
                <div class="col-md-7 col-12">
                    <div class="card-body mt-4">
                        <h1 class="card-title text-white text-center">Aventuras</h1>
                        <p class="card-text text-center text-white">Embárcate en una emocionante aventura llena de desafíos y descubrimientos. Desde la cima de majestuosas montañas hasta las profundidades de antiguas selvas, nuestros viajes de aventuras te llevan a lugares fuera de lo común y te sumergen en experiencias inolvidables.</p>
                        <div class="boton1 text-center"><a class="nav-link" href="Aventuras.php">Ver más</a></div>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <img src="https://www.monumental.co.cr/wp-content/uploads/2020/08/costa-rica-vacation-11.jpg" class="card-img" alt="...">
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
