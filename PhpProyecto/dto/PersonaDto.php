<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaDto
 *
 * @author CETECOM
 */
class PersonaDto {

    private $rut;
    private $nombre;
    private $apellido_pat;
    private $apellido_mat;
    private $fecha_nacimiento;
    private $sexo;

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido_pat() {
        return $this->apellido_pat;
    }

    function getApellido_mat() {
        return $this->apellido_mat;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido_pat($apellido_pat) {
        $this->apellido_pat = $apellido_pat;
    }

    function setApellido_mat($apellido_mat) {
        $this->apellido_mat = $apellido_mat;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function __toString() {
        return "Nombre: " . $this->nombre . " Apellido Paterno: " . $this->apellido_pat . " Apellido Materno: " . $this->apellido_mat . " Sexo: " . $this->sexo .
                " Fecha nacimiento: " . $this->fecha_nacimiento . " Rut: " . $this->rut;
    }

}
