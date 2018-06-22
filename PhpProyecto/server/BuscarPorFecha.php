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
        
        //Se guardan por sesión las variables de fecha para actualizar la lista que se encuentre en sesión
        //al momento de actualizar la solicitud
        $_SESSION["inicio"] = $inicio;
        $_SESSION["fin"] = $fin;
        
        
            header('Location: ../pages/SolicitudPorRutYFecha.php');
            
            if(!empty($_SESSION["SolicitudesPorRut"])){
                session_unset($_SESSION["SolicitudesPorRut"]);
            }
            
    } else {

        echo "<script> alert('No hay solicitudes entre dichas fechas');
        window.location.replace(' ../pages/SolicitudPorRutYFecha.php');
         </script>";
    }
} else {
    echo "<script> alert('Por favor escoja fechas entre las cuales desea buscar solicitudes');
        window.location.replace(' ../pages/SolicitudPorRutYFecha.php');
         </script>";
}
