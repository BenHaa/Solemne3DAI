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
include_once '../dao/SolicitudDaoImpl.php';
session_start();
//Si el rut no existe, se levanta la solicitud
header('Content-Type: text/html; charset=utf-8');
if (SolicitudDaoImpl::ExisteSolicitudPostulante($_SESSION["rut"])) {
    echo "<SCRIPT type='text/javascript'> 
        alert('El postulante ya realizó una solicitud');
        window.location.replace('../pages/FormularioPreAprobacion.php');
    </SCRIPT>";


    //  echo '<script> alert("El postulante ya realizó una solicitud") </script>';
} else {


////Primero se actualiza el objeto persona
//falta setear fecha
    $dtoPersona = PersonaDaoImpl::LeerObjeto($_SESSION["rut"]);

    $dtoPersona->setFecha_nacimiento($_POST["fechaNac"]);

    $dtoPersona->setSexo(SexoDaoImpl::StringToInt($_POST["cmbSexo"]));

    PersonaDaoImpl::ActualizarObjeto($dtoPersona);



//Luego se recuperan los datos del  postulante la página y se  ingresan a la bd
//falta comuna
    $dtoPostulante = new PostulanteDto();

    $dtoPostulante->setDireccion($_POST["txtDireccion"]);
    $dtoPostulante->setEmail($_POST["txtEmail"]);
    if (isset($_POST["chkEnfermedad"])) {
        $dtoPostulante->setEnfermedadCronica(true);
    } else {
        $dtoPostulante->setEnfermedadCronica(false);
    }

    $dtoPostulante->setEstadoCivil(EstadoCivilDaoImpl::StringToInt($_POST["cmbEstadoCivil"]));
    $hijos = 0;
    if (isset($_POST["txtHijos"])) {
        $hijos = $_POST["txtHijos"];
    }
    $dtoPostulante->setHijos($hijos);
    $dtoPostulante->setIdComuna(ComunaDaoImpl::StringToInt($_POST["txtComuna"]));
//$dtoPostulante->setIdComuna(ComunaDaoImpl::StringToInt($_POST["cmbComuna"]));
    $dtoPostulante->setIdNivelEducacion(EducacionDaoImpl::StringToInt($_POST["cmbEducacion"]));
    $dtoPostulante->setRenta(RentaDaoImpl::StringToInt($_POST["cmbRenta"]));
    $dtoPostulante->setRutPersona($_SESSION["rut"]);
    $dtoPostulante->setSueldoLiq($_POST["txtSueldo"]);
    $dtoPostulante->setTelefono($_POST["txtTelefono"]);


    if (PostulanteDaoImpl::agregarObjeto($dtoPostulante)) {
        //Finalmente se genera la solicitud

        $dtoSolicitud = new SolicitudDto();
        $dtoSolicitud->setIdPostulante(PostulanteDaoImpl::RecuperarUltimoid());
        $dtoSolicitud->setIdEstado(2); // Pendiente, por defecto

        if (SolicitudDaoImpl::agregarObjeto($dtoSolicitud)) {
            echo "<script> 
        alert('Se realizó la solicitud con éxito');
        window.location.replace('../pages/FormularioPreAprobacion.php');
    </script>";
        } else {
            echo "<SCRIPT type='text/javascript'> 
        alert('No se pudo realizar la  solicitud');
        window.location.replace('../pages/FormularioPreAprobacion.php');
    </SCRIPT>";
        }
    } else {

    }
}




    