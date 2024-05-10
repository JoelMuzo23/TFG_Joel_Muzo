<?php
/* Aqui se recupera los datos post y se valida dichos datos y se añaden estos datos a la funcion de modificar falta validar*/ 
    
    $nombre = $_POST["nombre"];
    $ubicacion = $_POST["ubicacion"];
    $actividades = $_POST["actividades"]; 
    $nivel = $_POST["nivel"];
    $informacion = $_POST["informacion"]; 
    $precio = $_POST["precio"];
    $id_aventura = $_GET["id_aventura"];
    
    require_once("Proyecto2.php");
    $mod = new Proyecto2();
    $mod -> modificarAventura($nombre, $ubicacion, $actividades, $nivel, $informacion, $precio, $id_aventura);
?>