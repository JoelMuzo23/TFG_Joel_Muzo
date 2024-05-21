<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="estilos/css_mis_comentarios.css">
    <title>Mis comentarios</title>
</head>

<body>

    <!-- Parte superior donde se ha diseñado un contenedor donde se coloca una imagen que se movera cuando baje -->
    <div class="parallax">
        <!--Se añade un overlay para darle una superposicion al fondo-->
        <div class="overlay"></div>
        <div class="content">
            <!--Encabezado principal del fondo-->
            <h1 class="display-4 fw-bold">Tu Voz, Nuestro Secreto:</h1>
            <!--Parrafo descriptivo-->
            <p>Mostrando tus Comentarios</p>
        </div>
    </div>

    <?php
        /* Comprobacion de que el usuario a iniciado sesion esto hara dos cosas */
        session_start();
        if(isset($_SESSION["nombre"])){
    ?>

    <!-- 
        Si el usuario ha iniciado sesion, se va a mostrar un texto descriptivo seguido se llamara a la funcion
        mostarComentario(), dicha funcion mostrara todos los comentarios que tenga dicho usuario mediante el id
        pasado.
    -->
    <div class="container">
        <h3 class="mt-1 text-center">Hola <?=$_SESSION["nombre"]?>, aquí te muestro tus comentarios</h3>
        <div class="row">
            <?php
                $id =  $_SESSION["id"];
                require_once("Proyecto.php");
                $proyecto = new Proyecto();
                $coment = $proyecto->mostarComentario($id);

                if (empty($coment)) {
                    echo "<div class=' text-center mt-4'> No hay comentarios. <a href='Comentario.php'> Añadir comentario </a></div>";
                } else {
                    foreach ($coment as $comentario) {
            ?>
            <div class="col-md-4 mt-4">
                <div class="card h-100">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h6 class="card-title"><?= $comentario["viaje"] ?></h6>
                        <a href="Borrar_comentario.php?id_comentario=<?= $comentario['id_comentario'] ?>" class="btn-close btn-close-white"></a>
                    </div>
                    <div class="card-body">
                        <h6 class="modal-subtitle text-secondary"> <?= $comentario["nombre"] . " " . $comentario["apellido"] ?> </h6>
                        <p> <?= $comentario["descripcion"] ?></p>
                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-secondary">Fecha del comentario: <?= $comentario["fecha"] ?></h6>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div> 
    </div> 

    <?php
        // Y si no ha iniciado sesion mostrara un mensaje de acceso no autorizado
        } else {
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                Acceso no autorizado. <br> 
                <a href='Login.php'> Por favor, inicia sesión.</a>
              </div>";
        }
    ?>

    <!-- Parte Inferior de la página -->
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
