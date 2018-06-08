<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDto
 *
 * @author CETECOM
 */
class UsuarioDto {

    private $idUsuario;
    private $nombreUsuario;
    private $contrasena;
    private $idPerfil;

    
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getIdPerfil() {
        return $this->idPerfil;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }


    
    
    
}
