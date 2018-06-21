<?php

include_once '../dao/SolicitudDaoImpl.php';
header('Content-Type: text/html; charset=utf-8');

if (!empty($_POST["clnDesde"]) && !empty($_POST["clnHasta"])) {
    session_start();
    $inicio = $_POST["clnDesde"];
    $fin = $_POST["clnHasta"];
    $solicitudesPorFecha = SolicitudDaoImpl::BuscarPorFecha($inicio, $fin);
    if (!empty($solicitudesPorFecha)) {
        $_SESSION["SolicitudesPorFecha"] = $solicitudesPorFecha;
            header('Location: ../pages/probando2.php');
    } else {

        echo "<script> alert('No hay solicitudes entre dichas fechas');
        window.location.replace(' ../pages/probando2.php');
         </script>";
    }
} else {
    echo "<script> alert('Por favor escoja fechas entre las cuales desea buscar solicitudes');
        window.location.replace(' ../pages/probando2.php');
         </script>";
}
