<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <!-- Encabezado de la pagina inicial -->
    <nav class="navbar navbar-expand-lg bg-black sticky-top">
        <div class="container-fluid">
    
            <!-- Logo del Encabezado -->
            <a href="Inicio.php"><img class="logo" src="../img/Logo.png" alt=""></a>
    
            <!-- Boton para el Desplegable del Menu -->
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Menu de la Pagina con una comprobacion si se ha iniciado sesion o no  -->
            <div class="collapse navbar-collapse justify-content-end ml-3 " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Ofertas.php">Ofertas</a> </div>
                    </li>
    
                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Hoteles.php">Hoteles</a> </div>
                    </li>

                    <li class="nav-item">
                        <div class="boton"> <a class="nav-link" aria-current="page" href="Viajes.php">Viajes</a> </div>
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
                                        <div class="boton_desple"> <a class="dropdown-item" href="menu_usuario/Perfil.php">Mi Perfil</a> </div> 
                                    </li>

                                    <li class="nav-item">
                                        <div class="boton_desple"> <a class="dropdown-item" href="menu_usuario/Mis_reservas.php">Mis Reservas</a> </div> 
                                    </li>

                                    <li class="nav-item">
                                        <div class="boton_desple"> <a class="dropdown-item" href="menu_usuario/Comentario.php">Añadir <br> Comentario</a> </div> 
                                    </li>

                                    <li class="nav-item">
                                        <div class="boton_desple"> <a class="dropdown-item" href="menu_usuario/Mis_comentarios.php">Mis <br> Comentario</a> </div> 
                                    </li>

                                    <li class="nav-item">
                                        <div class="boton_cerrar"> <a class="dropdown-item" href="menu_usuario/Cerrar.php">Cerrar</a> </div> 
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

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
