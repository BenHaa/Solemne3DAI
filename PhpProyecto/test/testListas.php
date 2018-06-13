<?php

include_once '../dao/ListasPostulanteDaoImp.php';
include_once '../dao/PostulanteDaoImpl.php';
include_once '../dto/PostulanteDto.php';
include_once '../dao/SexoDaoImpl.php';
include_once '../dao/EducacionDaoImpl.php';
include_once '../dao/SolicitudDaoImpl.php';
include_once '../dao/ComunaDaoImpl.php';

foreach (ListasPostulanteDaoImp::listarEducacion() as $value) {
    echo "<h1>" . $value . "</h1>";
}

$dto = new PostulanteDto();

$dto = PostulanteDaoImpl::LeerObjeto(1);


$plop = ComunaDaoImpl::AutoCompletadoComuna('P');
foreach ($plop as $value) {
    echo $value;
}




