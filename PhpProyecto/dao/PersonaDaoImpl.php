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

class PersonaDaoImpl implements PersonaDao {

    public static function ActualizarObjeto($dto) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE PERSONA SET nombre=?, ap_paterno=?, ap_materno=?, sexo=?, fecha_nac=? where rut=?;");

            $nombre = $dto->getNombre();
            $apellidoP = $dto->getApellido_pat();
            $apellidoM = $dto->getApellido_mat();
            $fechaNacimiento = $dto->getFecha_nacimiento();
            $sexo = $dto->getSexo();
            $rut = $dto->getRut();

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $apellidoP);
            $stmt->bindParam(3, $apellidoM);
            $stmt->bindParam(4, $sexo);
            $stmt->bindParam(5, $fechaNacimiento);
            $stmt->bindParam(6, $rut);


            $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function EliminarObjeto($id) {
        
    }

    public static function IntToString($int) {
        
    }

    public static function LeerObjeto($id) {

        $dto = new PersonaDto();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM PERSONA WHERE RUT=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                $dto->setApellido_mat($value["ap_materno"]);
                $dto->setApellido_pat($value["ap_paterno"]);
                $dto->setSexo($value["sexo"]);
                $dto->setFecha_nacimiento($value["fecha_nac"]);
                $dto->setNombre($value["nombre"]);
                $dto->setRut($value["rut"]);
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dto;
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
