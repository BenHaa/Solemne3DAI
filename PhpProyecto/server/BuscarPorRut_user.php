<?php

include_once '../dao/SolicitudDaoImpl.php';

session_start();
$rutPersona = $_SESSION["rut"];

if (empty($rutPersona)) {

    echo "<script> alert('Por favor, digite un rut válido');
        window.location.replace(' ../pages/estadoSolicitud.php');
         </script>";
} else {

    $solicitudesPorRut = SolicitudDaoImpl::BuscarPorRut($rutPersona);
    if (!empty($solicitudesPorRut)) {

        $_SESSION["SolicitudesPorRut"] = $solicitudesPorRut;
        session_commit();
        header('Location: ../pages/estadoSolicitud.php');
    } else {
        echo "<script> alert('Aún no se ha hecho una solicitud');
        window.location.replace(' ../pages/estadoSolicitud.php');
         </script>";
    }
}
