<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/css_blog.css">
    <title>Blog Viajes</title>
</head>
<body>

    <?php
      require_once("../includes/header.php");
    ?>


    <!--
      Debajo se mostrara un titulo descriptivo y seguido se mostrara la funcion llamada listarComentario(), dicha funcion mostrara mediante
      cards los comentarios que han añadido los usuarios, mostrando el nombre del viaje, el nombre del usuario, el comentario y la fecha.          
    -->
    <div class="container mt-4">
        <h1 class="text-center mb-5">"Historias de Viaje: Compartiendo Experiencias Inolvidables"</h1>
        <div class="row mt-2">
              <?php
                  require_once("../Proyecto.php");
                  $comentario = new Proyecto();
                  $comentario -> listarComentario();
              ?>
        </div>
    </div>

    <?php
        require_once("../includes/footer.php");
    ?>
</body>
</html>
