<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../estilos/css_recibo.css">
</head>
<body>
<?php
    if(isset($_GET['id'])) {
        $id_reserva = $_GET['id'];
?>
    <div class="confirmation-container">
        <i class="fa fa-check-circle"></i>
        <h1 class="display-4">¡Pago exitoso!</h1>
        <p class="lead">Gracias por tu compra. Hemos recibido tu pago correctamente.</p>
        <hr>
        <h4>Detalles del Pago</h4>
        <p><strong>Fecha:</strong> <?php echo date("d  F  Y"); ?></p>
        <a href="../pdf_ticket/PDFTicketCiu.php?id=<?= $id_reserva ?>"> Generar Ticket</a>
        <hr>
        <p class="lead">Te hemos enviado un correo con los detalles de tu compra.</p>
        <a href="../../Inicio.php" class="btn btn-primary">Volver al inicio</a>
    </div>
<?php
    }else{
        echo "<div class='alert alert-danger mt-3 rounded-pill' role='alert'> Acceso denegado, <a href= ../../Inicio.php>Volver</a </div>";
    }
?>


</body>
</html>
