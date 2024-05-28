<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Borrar Comentario</title>
</head>
<body>
    <?php
        /* 
            Aqui en este archivo lo que se hace es recoger el id del comentario que se pasa por GET
            y despues se lo añade a la funcion llamada borrarComentario() dicha funcion lo que hace
            borrar todo el comentario que tenga id que se ha recogido.
        */
        if(isset($_GET["id_comentario"])) {
            $id_comentario = $_GET["id_comentario"];
            require_once("../../Proyecto.php");
            $borrar_comentario = new proyecto();
            $borrar_comentario -> borrarComentario($id_comentario);
        }else{
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                    Acceso no autorizado. <br> 
                    <a href='../Login.php'> Por favor, inicia sesión.</a>
                </div>";
        }
        
        
    ?>
</body>
</html>
