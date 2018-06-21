<?php

include_once '../dao/ListasPostulanteDaoImp.php';
include_once '../dao/PostulanteDaoImpl.php';
include_once '../dto/PostulanteDto.php';
include_once '../dao/SexoDaoImpl.php';
include_once '../dao/EducacionDaoImpl.php';
include_once '../dao/SolicitudDaoImpl.php';
include_once '../dao/ComunaDaoImpl.php';
include_once '../dao/EstadoDaoImpl.php';

$das = SolicitudDaoImpl::BuscarPorRut("19.360.198-7");
foreach ($das as $val){
    echo EstadoDaoImpl::IntToString($val->getIdEstado());
}



