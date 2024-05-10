<?php
/* Aqui se recupera los datos post y se valida dichos datos y se añaden estos datos a la funcion de modificar falta validar*/ 
    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $descripcion = $_POST["descripcion"]; 
    $transporte =$_POST["transporte"];
    $informacion =$_POST["informacion"];
    $precio = $_POST["precio"];
    $id_ciudad = $_GET["id_ciudad"];
    
    require_once("Proyecto2.php");
    $mod = new Proyecto2();
    $mod -> modificarCiudad($nombre, $pais, $descripcion, $transporte, $informacion, $precio, $id_ciudad);
?>