<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonaDaoImpl
 *
 * @author CETECOM
 */
include_once 'PersonaDao.php';
include_once '../dto/PersonaDto.php';
include_once '../sql/ClasePDO.php';

class PersonaDaoImpl extends PersonaDao {

    public static function ActulizarObjeto($id) {
        
    }

    public static function EliminarObjeto($id) {
        
    }

    public static function IntToString($int) {
        
    }

    public static function LeerObjeto($id) {
        
    }

    public static function StringToInt($string) {
        
    }

    public static function agregarObjeto($dto) {
        $pdo = new clasePDO();
        try {

            $stmt = $pdo->prepare("INSERT INTO PERSONA(rut, nombre, ap_paterno, ap_materno, sexo, fecha_nac) VALUES(?,?,?,?,?,?)");

            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $apellidoP = $dto->getApellido_pat();
            $apellidoM = $dto->getApellido_mat();
            $sexo = $dto->getSexo();
            $fechaNac = $dto->getFecha_nacimiento();


            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $apellidoP);
            $stmt->bindParam(4, $apellidoM);
            $stmt->bindParam(5, $sexo);
            $stmt->bindParam(6, $fechaNac);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
            echo "Error al agregar persona: " . $exc->getTraceAsString();
        }
        return false;
    }

}
