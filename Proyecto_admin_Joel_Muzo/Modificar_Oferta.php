<?php
/* Aqui se recupera los datos post y se valida dichos datos y se añaden estos datos a la funcion de modificar falta validar*/ 
    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $descripcion = $_POST["descripcion"]; 
    $actividad =$_POST["actividad"];
    $informacion =$_POST["informacion"];
    $precio = $_POST["precio"];
    $id_oferta = $_GET["id_oferta"];
    
    require_once("Proyecto2.php");
    $mod = new Proyecto2();
    $mod -> modificarOferta($nombre, $pais, $descripcion, $actividad, $informacion, $precio, $id_oferta);
?>