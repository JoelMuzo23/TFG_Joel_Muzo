<?php
/* Aqui se recupera los datos post y se valida dichos datos y se añaden estos datos a la funcion de modificar falta validar */ 
    $nombre = $_POST["nombre"];
    $ciudad = $_POST["ciudad"];
    $estrellas = $_POST["estrellas"]; 
    $servicios =$_POST["servicios"];
    $precio = $_POST["precio"];
    $historia = $_POST["historia"];
    $servicio = $_POST["servicio"];
    $ubicacion = $_POST["ubicacion"];
    $id_hotel = $_GET["id_hotel"];
    
    require_once("Proyecto2.php");
    $mod = new Proyecto2();
    $mod -> modificarHotel($nombre, $ciudad, $estrellas, $servicios, $precio, $historia, $servicio, $ubicacion, $id_hotel);
?>