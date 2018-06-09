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

class UsuarioDaoImpl extends UsuarioDao {

    //put your code here
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


            $stmt = $pdo->prepare("INSERT INTO USUARIO(password, id_perfil, rut_persona, id_usuario) VALUES(?,?,?,?)");



            $password = $dto->getContrasena();
            $idPefil = $dto->getIdPerfil();
            $rut = $dto->getRut();
            $idUsuario = $dto->getIdUsuario();

            $stmt->bindParam(1, $password);
            $stmt->bindParam(2, $idPefil);
            $stmt->bindParam(3, $rut);
            $stmt->bindParam(4, $idUsuario);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $pdo = null;
                return true;
            }
        } catch (Exception $exc) {
            echo "Error al agregar usuario: " . $exc->getTraceAsString();
        }
        return false;
    }

}
