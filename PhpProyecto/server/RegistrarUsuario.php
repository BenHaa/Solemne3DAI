<?php

include_once '../dto/PersonaDto.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/UsuarioDaoImpl.php';
include_once '../dao/PersonaDaoImpl.php';


$dtoUsuario = new UsuarioDto();
$dtoPersona = new PersonaDto();

//Primero se crea el objeto persona. Los valores correspondientes al sexo y fecha de nacimiento se actualizarán
//cuando se haga la postulación por parte al usuario, esto debido al modelo planteado por el examen.
$dtoPersona->setNombre($_POST["txtNombre"]);
$dtoPersona->setApellido_pat($_POST["txtApPaterno"]);
$dtoPersona->setApellido_mat($_POST["txtApMaterno"]);
$dtoPersona->setSexo(3); //NO INDICA
$dtoPersona->setFecha_nacimiento("1990-01-01"); //POR DEFECTO
$dtoPersona->setRut($_POST["txtRut"]);

echo $dtoPersona->__toString();

session_start();

//Luego se crea al usuario, sólo si es que la creación de la persona se realiza con éxito

if (PersonaDaoImpl::agregarObjeto($dtoPersona)) {
    $dtoUsuario->setIdPerfil(1);
    $dtoUsuario->setIdUsuario(1);
    if ($_POST["txtContrasena"] == $_POST["txtContrasena2"]) {
        $dtoUsuario->setContrasena($_POST["txtContrasena"]);
    }
    $dtoUsuario->setRut($_POST["txtRut"]);

    if (UsuarioDaoImpl::agregarObjeto($dtoUsuario)) {
        $_SESSION["exito"] = true;
        header('Location: ../pages/LoginUser.php');
    } else {
        echo $dtoUsuario->__toString();
    }
} else {
    header('Location: ../pages/LoginUser.php');
    $_SESSION["exito"] = false;
}





