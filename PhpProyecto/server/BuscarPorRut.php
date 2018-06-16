<?php

include_once '../dao/SolicitudDaoImpl.php';




if (!empty(($_POST["txtRut"]))) {

    $solicitudesPorRut = SolicitudDaoImpl::BuscarPorRut($_POST["txtRut"]);

    if (!empty($solicitudesPorRut)) {
        session_start();
        $_SESSION["SolicitudesPorRut"] = $solicitudesPorRut;
        print_r($solicitudesPorRut);
        //  header('Location: ../pages/SolicitudPorRutYFecha.php');
    } else {
        echo "<script> alert('No hay solicitudes para dicho rut, verifique el rut que acaba de ingresar');
        window.location.replace(' ../pages/SolicitudPorRutYFecha.php');
         </script>";
    }
} else {
    echo "<script> alert('Por favor, digite un rut válido');
        window.location.replace(' ../pages/SolicitudPorRutYFecha.php');
         </script>";
}