<?php

include_once '../dao/SolicitudDaoImpl.php';




if (!empty(($_POST["txtRut"]))) {
    session_start();
    $rut = $_POST["txtRut"];
    $solicitudesPorRut = SolicitudDaoImpl::BuscarPorRut($rut);

    if (!empty($solicitudesPorRut)) {

        $_SESSION["SolicitudesPorRut"] = $solicitudesPorRut;

        //Se guarda en sesión para recargar la lista en ActualizarSolicitud
        $_SESSION["rut"] = $rut;

        if (!empty($_SESSION["SolicitudesPorFecha"])) {
            session_unset($_SESSION["SolicitudesPorFecha"]);
        }


        header('Location: ../pages/probando2.php');
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