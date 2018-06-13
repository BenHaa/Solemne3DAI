<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostulanteDaoImpl
 *
 * @author CETECOM
 */
include_once 'BaseDao.php';
include_once 'ConversionDao.php';
include_once '../dto/PostulanteDto.php';

class PostulanteDaoImpl implements BaseDao, ConversionDao {

//put your code here

    public static function agregarObjeto($dto) {
        try {
            $clasePdo = new clasePDO();
            $query = " INSERT INTO postulante"
                    . " (est_civil, hijos, telefono,"
                    . " email, direccion, comuna,"
                    . " nivel_educacion, renta,"
                    . " sueldo_liq, enfermedad_cronica,"
                    . " rut_postulante)"
                    . " VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $clasePdo->prepare($query);
            $stmt->bindValue(1, $dto->getEstadoCivil());
            $stmt->bindValue(2, $dto->getHijos());
            $stmt->bindValue(3, $dto->getTelefono());
            $stmt->bindValue(4, $dto->getEmail());
            $stmt->bindValue(5, $dto->getDireccion());
            $stmt->bindValue(6, $dto->getIdComuna());
            $stmt->bindValue(7, $dto->getIdNivelEducacion());
            $stmt->bindValue(8, $dto->getRenta());
            $stmt->bindValue(9, $dto->getSueldoLiq());
            $stmt->bindValue(10, $dto->getEnfermedadCronica());
            $stmt->bindValue(11, $dto->getRutPersona());
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $clasePdo = null;
                return true;
            }
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
        }
        $clasePdo = null;
        return false;
    }

    public static function ActualizarObjeto($dto) {
        
    }

    public static function EliminarObjeto($id) {
        
    }

    public static function LeerObjeto($id) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM POSTULANTE WHERE ID_POSTULANTE=?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                $dto = new PostulanteDto();

                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {

                    $dto->setDireccion($value["direccion"]);
                    $dto->setEmail($value["email"]);
                    $dto->setIdComuna($value["comuna"]);
                    $dto->setIdNivelEducacion($value["nivel_educacion"]);
                    $dto->setEnfermedadCronica($value["enfermedad_cronica"]);
                    $dto->setSueldoLiq($value["sueldo_liq"]);
                    $dto->setRutPersona($value["rut_postulante"]);
                    $dto->setHijos($value["hijos"]);
                    $dto->setEstadoCivil($value["est_civil"]);
                    $dto->setIdPostulante($value["id_postulante"]);
                    $dto->setRenta($value["renta"]);
                    $dto->setTelefono($value["telefono"]);
                    return $dto;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return;
    }

    public static function IntToString($int) {
        
    }

    public static function StringToInt($string) {
        
    }

    public static function RecuperarUltimoid() {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("select max(id_postulante) from postulante");

            if ($stmt->execute()) {
                $resultados = $stmt->fetchAll();
                foreach ($resultados as $value) {
                    $pdo = null;
                    return $value["max(id_postulante)"];
                }
            } else {
                $pdo = null;
                return;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
