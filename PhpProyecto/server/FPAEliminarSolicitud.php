<?php

include_once '../dao/SolicitudDaoImpl.php';


if (isset($_POST["idSolicitud"])) {
    SolicitudDaoImpl::EliminarObjeto($_POST["idSolicitud"]);
}
