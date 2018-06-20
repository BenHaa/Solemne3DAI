<?php

include_once '../dao/UsuarioDaoImpl.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/PersonaDaoImpl.php';
include_once '../dto/PersonaDto.php';

session_start();
if (isset($_POST["txtRut"]) & isset($_POST["txtPassword"])) {
    
    if (UsuarioDaoImpl::ComprobarUsuario($_POST["txtRut"], $_POST["txtPassword"])) {
        $dto = UsuarioDaoImpl::LeerObjeto($_POST["txtRut"]);
        $_SESSION["usuario"] = $dto->getIdUsuario();
        $_SESSION["perfil"] = $dto->getIdPerfil();
        $persona = PersonaDaoImpl::LeerObjeto($_POST["txtRut"]);
        $_SESSION["persona"] = $persona->getNombre() . ' ' . $persona->getApellido_pat() . ' ' . $persona->getApellido_mat();
        //session_commit();
        
        session_commit();
      
        if ($dto->getIdPerfil() == '1') {
                header('Location: ../pages/postulanteHome.php');
            }
            if ($dto->getIdPerfil() == '2') {
                header('Location: ../pages/ejecutivoHome.php');
            }
        //header('Location: ../pages/dashboard.php');
    } else {
        echo "<script> alert('Usuario o contraseña incorrectos'); </script>";
        //header('Location: ../pages/Loginv2.php');
    }
}

