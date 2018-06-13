<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../dao/UsuarioDaoImpl.php';
include_once '../dto/UsuarioDto.php';


if (isset($_POST["txtRut"]) & isset($_POST["txtPassword"])) {
    echo 'hola';
    if (UsuarioDaoImpl::ComprobarUsuario($_POST["txtRut"], $_POST["txtPassword"])) {
        
        
        
        
        header('Location: ../pages/RegistrarUsuario.php');
    }
}

