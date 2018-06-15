<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDaoImpl
 *
 * @author CETECOM
 */
include_once 'UsuarioDao.php';
include_once '../dto/UsuarioDto.php';
include_once '../sql/ClasePDO.php';

class UsuarioDaoImpl implements UsuarioDao {

    //put your code here
    public static function ActualizarObjeto($dto) {
        
    }

    public static function EliminarObjeto($id) {
        
    }

    public static function IntToString($int) {
        
    }

    public static function LeerObjeto($id) {
        $dto = new UsuarioDto();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare('SELECT * FROM USUARIO WHERE RUT_PERSONA=?');
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $val) {
                $dto->setIdPerfil($val["id_perfil"]);
                $dto->setIdUsuario($val["id_usuario"]);
                $dto->setRut($val["rut_persona"]);
                return $dto;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $dto;
    }

    public static function StringToInt($string) {
        
    }

    public static function agregarObjeto($dto) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO USUARIO(password, id_perfil, rut_persona) VALUES(?,?,?)");
            $password = $dto->getContrasena();
            $idPefil = $dto->getIdPerfil();
            $rut = $dto->getRut();
            $idUsuario = $dto->getIdUsuario();

            $stmt->bindParam(1, $password);
            $stmt->bindParam(2, $idPefil);
            $stmt->bindParam(3, $rut);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $pdo = null;
                return true;
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo "Error al agregar usuario: " . $exc->getTraceAsString();
        }

        return false;
    }

    public static function ComprobarUsuario($rut, $pass) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM USUARIO WHERE RUT_PERSONA=? AND PASSWORD=?");

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            if (!empty($rs)) {
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

}
