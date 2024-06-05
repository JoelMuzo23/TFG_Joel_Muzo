<?php
    require_once("../../../../Proyecto2.php");

    $reserva = new Proyecto2();
    $id_ofertas = isset($_GET['id_oferta']) ? $_GET['id_oferta'] : null;
    if ($id_ofertas) {
        $reserva->borrarOfertas($id_ofertas);
    }

    $reserva2 = new Proyecto2();
    $id_hotel = isset($_GET['id_hotel']) ? $_GET['id_hotel'] : null;
    if ($id_hotel) {
        $reserva2->borrarHoteles($id_hotel);
    }

    $reserva3 = new Proyecto2();
    $id_ciudad = isset($_GET['id_ciudad']) ? $_GET['id_ciudad'] : null;
    if ($id_ciudad) {
        $reserva3->borrarCiudades($id_ciudad);
    }

    $reserva4 = new Proyecto2();
    $id_playa = isset($_GET['id_playa']) ? $_GET['id_playa'] : null;
    if ($id_playa) {
        $reserva4->borrarPlayas($id_playa);
    }

    $reserva5 = new Proyecto2();
    $id_espacio = isset($_GET['id_espacio']) ? $_GET['id_espacio'] : null;
    if ($id_espacio) {
        $reserva5->borrarEspacio($id_espacio);
    }

    $reserva6 = new Proyecto2();
    $id_crucero = isset($_GET['id_crucero']) ? $_GET['id_crucero'] : null;
    if ($id_crucero) {
        $reserva6->borrarCrucero($id_crucero);
    }

    $reserva7 = new Proyecto2();
    $id_cultura = isset($_GET['id_cultura']) ? $_GET['id_cultura'] : null;
    if ($id_cultura) {
        $reserva7->borrarCultural($id_cultura);
    }

    $reserva8 = new Proyecto2();
    $id_aventura = isset($_GET['id_aventura']) ? $_GET['id_aventura'] : null;
    if ($id_aventura) {
        $reserva8->borrarAventura($id_aventura);
    }
?>