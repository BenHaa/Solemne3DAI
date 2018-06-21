<?php

include_once '../dao/ComunaDaoImpl.php';
$jsondata = new arrayObject();

if (isset($_GET["txtComuna"])) {

    header('Content-type: application/json; charset=utf-8');
    $jsondata = ComunaDaoImpl::AutoCompletadoComuna($_GET["txtComuna"]);
    echo json_encode($jsondata);
}

