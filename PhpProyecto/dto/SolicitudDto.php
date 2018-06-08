<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudDto
 *
 * @author CETECOM
 */
class SolicitudDto {
    
    private $idSolicitud;
    private $idPostulante;
    private $idEstado;
    private $fechaRegistro;

    function getIdSolicitud() {
        return $this->idSolicitud;
    }

    function getIdPostulante() {
        return $this->idPostulante;
    }

    function getIdEstado() {
        return $this->idEstado;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function setIdSolicitud($idSolicitud) {
        $this->idSolicitud = $idSolicitud;
    }

    function setIdPostulante($idPostulante) {
        $this->idPostulante = $idPostulante;
    }

    function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }


    
    
}
