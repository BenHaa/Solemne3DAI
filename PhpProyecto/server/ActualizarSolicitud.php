<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../dao/SolicitudDaoImpl.php';


if (isset($_POST["radio-1"]) && isset($_POST["idSolicitud"])) {

    $idEstado = $_POST["radio-1"];
    $numSolicitud = $_POST["idSolicitud"];

    if (SolicitudDaoImpl::ActualizarEstado($idEstado, $numSolicitud)) {
        echo "<script> 
        
        window.location.replace('../pages/ListadoSolicitudes.php');
        alert('La solicitud se actualizó correctamente');
    </script>";
        
    } else {
        echo "<script> 
        alert('La solicitud no se pudo actualizar');
        window.location.replace('../pages/ListadoSolicitudes.php');
    </script>";
    }
}

