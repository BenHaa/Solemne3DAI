<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostulanteDao
 *
 * @author CETECOM
 */
class PostulanteDao implements BaseDao{
    //put your code here
    //registrar postulante
    public static function agregarObjeto($dto) {
        try {
            $clasePdo = new clasePDO();
            $query = " INSERT INTO postulante"
                    . " (est_civil, hijos, telefono,"
                    . " email, direccion, comuna,"
                    . " nivel_educacion, renta,"
                    . " sueldo_liq, Enfermedad_cronica,"
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
    public static function ActulizarObjeto($id) {
        try {
            $clasePdo = new clasePDO();
            $query = " INSERT INTO postulante"
                    . " (est_civil, hijos, telefono,"
                    . " email, direccion, comuna,"
                    . " nivel_educacion, renta,"
                    . " sueldo_liq, Emfermedad_cronica,"
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

    public static function EliminarObjeto($id) {
        
    }

    public static function LeerObjeto($id) {
        
    }

    

}
