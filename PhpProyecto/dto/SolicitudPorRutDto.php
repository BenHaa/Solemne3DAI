<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudPorRutDto
 *
 * @author benja
 */
class SolicitudPorRutDto {
    //put your code here
    private $Rut;
    private $Nombre;
    private $Estado;
    function __construct() {
        
    }
    
    function getRut() {
        return $this->Rut;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getEstado() {
        return $this->Estado;
    }

    function setRut($Rut) {
        $this->Rut = $Rut;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }



}
