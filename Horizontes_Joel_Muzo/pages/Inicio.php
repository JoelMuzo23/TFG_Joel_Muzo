<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../estilos/css_inicio.css">
    <title>Inicio</title>
</head>
<body>
        <?php
            require_once("../includes/header.php");
        ?>

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
                       <img class="img-fluid " src="../img/Imagen1.jpg" alt="Imagen 1">
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

        <?php
            require_once("../includes/footer.php");
        ?>
        
</body>
</html>
