<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunaDto
 *
 * @author CETECOM
 */
class ComunaDto {

    private $idComuna;
    private $descripcion;

    
    function getIdComuna() {
        return $this->idComuna;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdComuna($idComuna) {
        $this->idComuna = $idComuna;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
    
    
}
