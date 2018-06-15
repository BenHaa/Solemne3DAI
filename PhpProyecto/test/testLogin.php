<?php

include_once '../dao/UsuarioDaoImpl.php';
include_once '../dto/UsuarioDto.php';
include_once '../dao/PersonaDaoImpl.php';
include_once '../dto/PersonaDto.php';


if (UsuarioDaoImpl::ComprobarUsuario("19.360.198-7", "hola")) {
        $dto = UsuarioDaoImpl::LeerObjeto("19.360.198-7");
        session_start();
        $_SESSION["usuario"] = $dto->getIdUsuario();
        echo $dto->getIdUsuario();
        $_SESSION["perfil"] = $dto->getIdPerfil();
        echo $dto->getIdPerfil();
        $persona = PersonaDaoImpl::LeerObjeto("19.360.198-7");
        echo $persona->getNombre() . ' ' . $persona->getApellido_pat() . ' ' . $persona->getApellido_mat();
        $_SESSION["persona"] = $persona->getNombre() . ' ' . $persona->getApellido_pat() . ' ' . $persona->getApellido_mat();
        //session_commit();
        //header('Location: ../pages/dashboard.php');
        echo "script ok";
    } else {
        echo "script malo";
        //header('Location: ../pages/Loginv2.php');
    }