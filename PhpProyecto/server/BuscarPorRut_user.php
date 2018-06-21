<?php

include_once '../dao/SolicitudDaoImpl.php';
if (!empty($_POST["txtRut"])) {

    if($_SESSION["rut"]!=$_POST["txtRut"]){
        echo "<script> alert('Por favor, digite un rut válido');
        window.location.replace(' ../pages/estadoSolicitud.php');
         </script>";
    }else{
        $solicitudesPorRut = SolicitudDaoImpl::BuscarPorRut($_POST["txtRut"]);
    if (!empty($solicitudesPorRut)) {
        session_start();
        $_SESSION["SolicitudesPorRut"] = $solicitudesPorRut;
        print_r($solicitudesPorRut);
        session_commit();
        header('Location: ../pages/estadoSolicitud.php');
    } else {
        echo "<script> alert('No hay solicitudes para dicho rut, verifique el rut que acaba de ingresar');
        window.location.replace(' ../pages/estadoSolicitud.php');
         </script>";
    }
    }
} else {
    echo "<script> alert('Por favor, digite un rut válido');
        window.location.replace(' ../pages/estadoSolicitud.php');
         </script>";
}