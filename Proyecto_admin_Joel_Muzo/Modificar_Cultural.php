<?php
/* Aqui se recupera los datos post y se valida dichos datos y se añaden estos datos a la funcion de modificar*/ 
    $nombre = $_POST["nombre"];
    $ubicacion = $_POST["ubicacion"];
    $descripcion = $_POST["descripcion"]; 
    $informacion = $_POST["informacion"];
    $precio = $_POST["precio"];
    $id_cultura = $_GET["id_cultura"];
    
    require_once("Proyecto2.php");
    $mod = new Proyecto2();
    $mod -> modificarCultural($nombre, $ubicacion, $descripcion, $informacion, $precio, $id_cultura);
?>