<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/css_blog.css">
    <title>Blog Viajes</title>
</head>
<body>

    <!-- 
        Aqui se mostrara una barra de navegacion mostrando el logo de la agencia y sus respetivos botones de navegacion, tambien
        tiene una comprobación si el usuario ha iniciado sesión se le mostrara un menu para el usuario y si no ha iniciado sesion
        se mostrara la barra de navegacion por defecto.
      -->
    <nav class="navbar navbar-expand-lg bg-black">
      <div class="container-fluid">
          <img class="logo" src="img/Logo.png" alt="">

          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <div class="boton"> <a class="nav-link" aria-current="page" href="Inicio.php">Inicio</a> </div>
               </li>

              <li class="nav-item">
                <div class="boton "> <a class="nav-link" aria-current="page" href="Ofertas.php">Ofertas</a> </div>
              </li>

              <li class="nav-item">
                <div class="boton "> <a class="nav-link" aria-current="page" href="Viajes.php">Viajes</a> </div>
              </li>

              <li class="nav-item">
                <div class="boton "> <a class="nav-link" aria-current="page" href="Hoteles.php">Hotel</a> </div>
              </li>

              <li class="nav-item">
                <div class="boton "> <a class="nav-link" aria-current="page" href="Galeria.php">Galeria</a> </div>
              </li>
              <?php
                if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
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

    <!--
      Debajo se mostrara un titulo descriptivo y seguido se mostrara la funcion llamada listarComentario(), dicha funcion mostrara mediante
      cards los comentarios que han añadido los usuarios, mostrando el nombre del viaje, el nombre del usuario, el comentario y la fecha.          
    -->
    <div class="container mt-4">
        <h1 class="text-center mb-5">"Historias de Viaje: Compartiendo Experiencias Inolvidables"</h1>
        <div class="row mt-2">
              <?php
                  require_once("Proyecto.php");
                  $comentario = new Proyecto();
                  $comentario -> listarComentario();
              ?>
        </div>
    </div>

    <!-- Parte Inferior de la pagina -->
    <div class="row mt-5">
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
