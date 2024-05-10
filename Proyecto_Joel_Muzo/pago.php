<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Ofertas</title>
</head>
<body>
    <?php
    /*
        En este archivo se ha recogido por post y validado para luego añadirlo en la funcion de pago(), dicha 
        funcion lo que hace es añadir dichos valores a la base de datos correspondiente.
    */
        $fecha_salida =  $_POST["fecha_salida"];
        $fecha_llegada =  $_POST["fecha_llegada"];
        $id_oferta =  $_POST["id_oferta"];
        $id_usuario =  $_POST["id_usuario"];

        require_once("Proyecto.php");
        $pago = new Proyecto();
        $pago -> pago($id_oferta, $id_usuario,  $fecha_salida, $fecha_llegada);
    ?>
</body>
</html>