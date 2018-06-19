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
        if (session_status() == PHP_SESSION_DISABLED || session_status() == PHP_SESSION_NONE) {
            header('Location: ../pages/Loginv2.php');
        } ELSE {
            $perfil = $_SESSION["perfil"];
            if ($perfil == '1') {
                header('Location: ../pages/perfil1.php');
            }
            if ($perfil == '2') {
                header('Location: ../pages/perfil2.php');
            }
        }
        session_commit();
        //header('Location: ../pages/dashboard.php');
    } else {
        echo "<script> alert('Usuario o contraseña incorrectos'); </script>";
        //header('Location: ../pages/Loginv2.php');
    }
}

