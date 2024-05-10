<?php
/* Aqui se recupera los datos post y se valida dichos datos y se añaden estos datos a la funcion de modificar*/ 
   
    $nombre = $_POST["nombre"];
    $salida =$_POST["salida"];
    $descripcion = $_POST["descripcion"]; 
    $actividad =$_POST["actividad"];
    $informacion = $_POST["informacion"];
    $precio = $_POST["precio"];
    $id_crucero = $_GET["id_crucero"];
    
    require_once("Proyecto2.php");
    $mod = new Proyecto2();
    $mod -> modificarCrucero($nombre, $salida, $descripcion, $actividad, $informacion, $precio, $id_crucero);
?>