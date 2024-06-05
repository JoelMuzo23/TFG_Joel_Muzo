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
        if(isset($_GET["id"])) {
            $id_usuario = $_GET["id"];
            require_once("../../../../Proyecto2.php");
            $borrar_cliente = new proyecto2();
            $borrar_cliente->borrarCliente($id_usuario);
        } else {
            echo "<div class='alert alert-danger mt-3 rounded-pill text-center' role='alert'> 
                        Acceso no autorizado. <br> 
                        <a href='Login_admin.php'> Por favor, inicia sesión como administrador.</a>
                    </div>";
        }
    ?>
</body>
</html>
