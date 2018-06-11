<?php

include_once '../dto/PersonaDto.php';
include_once '../dto/PostulanteDto.php';
include_once '../dto/SolicitudDto.php';
include_once '../dao/PostulanteDaoImpl.php';
include_once '../dao/PersonaDaoImpl.php';
include_once '../dao/SolicitudDaoImpl.php';


//Conversiones

include_once '../dao/ComunaDaoImpl.php';
include_once '../dao/EducacionDaoImpl.php';
include_once '../dao/SexoDaoImpl.php';
include_once '../dao/RentaDaoImpl.php';
include_once '../dao/EstadoCivilDaoImpl.php';



//Primero se actualiza el objeto persona
//falta setear fecha
$dtoPersona = PersonaDaoImpl::LeerObjeto($_POST["txtRut"]);

$dtoPersona->setSexo(SexoDaoImpl::StringToInt($_POST["cmbSexo"]));
echo $dtoPersona->__toString();
PersonaDaoImpl::ActualizarObjeto($dtoPersona);



//Luego se recuperan los datos del  postulante la página y se  ingresan a la bd
//falta comuna
$dtoPostulante = new PostulanteDto();

$dtoPostulante->setDireccion($_POST["txtDireccion"]);
$dtoPostulante->setEmail($_POST["txtEmail"]);
$dtoPostulante->setEnfermedadCronica(true);
$dtoPostulante->setEstadoCivil(EstadoCivilDaoImpl::StringToInt($_POST["cmbEstadoCivil"]));
$dtoPostulante->setHijos($_POST["txtHijos"]);
$dtoPostulante->setIdComuna(1);
//$dtoPostulante->setIdComuna(ComunaDaoImpl::StringToInt($_POST["cmbComuna"]));
$dtoPostulante->setIdNivelEducacion(EducacionDaoImpl::StringToInt($_POST["cmbEducacion"]));
$dtoPostulante->setRenta(RentaDaoImpl::StringToInt($_POST["cmbRenta"]));
$dtoPostulante->setRutPersona($_POST["txtRut"]);
$dtoPostulante->setSueldoLiq($_POST["txtSueldo"]);
$dtoPostulante->setTelefono($_POST["txtTelefono"]);


PostulanteDaoImpl::agregarObjeto($dtoPostulante);

//Finalmente se genera la solicitud
$dtoSolicitud = new SolicitudDto();
$dtoSolicitud->setIdPostulante(PostulanteDaoImpl::RecuperarUltimoid());
$dtoSolicitud->setIdEstado(2); // Pendiente, por defecto

SolicitudDaoImpl::agregarObjeto($dtoSolicitud);










