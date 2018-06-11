<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostulanteDto
 *
 * @author CETECOM
 */
class PostulanteDto {

    private $idPostulante;
    private $hijos;
    private $direccion;
    private $idNivelEducacion;
    private $estadoCivil;
    private $renta;
    private $sueldoLiq;
    private $enfermedadCronica;
    private $idComuna;
    private $email;
    private $telefono;
    private $rutPersona;

    function getIdPostulante() {
        return $this->idPostulante;
    }

    function getHijos() {
        return $this->hijos;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getIdNivelEducacion() {
        return $this->idNivelEducacion;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getRenta() {
        return $this->renta;
    }

    function getSueldoLiq() {
        return $this->sueldoLiq;
    }

    function getEnfermedadCronica() {
        return $this->enfermedadCronica;
    }

    function getIdComuna() {
        return $this->idComuna;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getRutPersona() {
        return $this->rutPersona;
    }

    function setIdPostulante($idPostulante) {
        $this->idPostulante = $idPostulante;
    }

    function setHijos($hijos) {
        $this->hijos = $hijos;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setIdNivelEducacion($idNivelEducacion) {
        $this->idNivelEducacion = $idNivelEducacion;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setRenta($renta) {
        $this->renta = $renta;
    }

    function setSueldoLiq($sueldoLiq) {
        $this->sueldoLiq = $sueldoLiq;
    }

    function setEnfermedadCronica($enfermedadCronica) {
        $this->enfermedadCronica = $enfermedadCronica;
    }

    function setIdComuna($idComuna) {
        $this->idComuna = $idComuna;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setRutPersona($rutPersona) {
        $this->rutPersona = $rutPersona;
    }

    public function __toString() {
        return "Id Postulante: " . $this->idPostulante .  '<br>' .
                " Direccion: " . $this->direccion .  '<br>' .
                " Rut Postulante: " . $this->rutPersona .  '<br>' .
                " Id Comuna: " . $this->idComuna .  '<br>' .
                " Email: " . $this->idComuna . '<br>' .
                " Telefono: " . $this->telefono . '<br>' .
                " Sueldo liquido: " . $this->sueldoLiq .  '<br>' .
                " Estado civil: " . $this->estadoCivil .  '<br>' .
                " Hijos: " . $this->hijos .  '<br>' .
                " Id Educacion: " .  $this->idNivelEducacion .  '<br>' .
                " Renta: " . $this->renta .  '<br>' .
                " Enfermedad cronica: " . $this->enfermedadCronica;
    }

}
