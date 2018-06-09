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
    private $contrasena;
    private $idPerfil;
    private $rut;

    function getRut() {
        return $this->rut;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function getIdUsuario() {
        return $this->idUsuario;
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

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function __toString() {
        return "idUsuario : " . $this->idUsuario . " Id Perfil: " . $this->idPerfil . " Contraseña:  " . $this->contrasena .
                " Rut: " . $this->rut;
    }

}
