<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Borrar Cliente</title>
</head>
<body>
    <?php
        if(isset($_GET["id_comentario"])) {
            $id_comentario = $_GET["id_comentario"];
            require_once("Proyecto.php");
            $borrar_comentario = new proyecto();
            $borrar_comentario->borrarComentario($id_comentario);
        } else {
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                        Acceso no autorizado. <br> 
                        <a href='Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                    </div>";
        }
    ?>
</body>
</html>
