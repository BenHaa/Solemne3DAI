<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SexoDaoImpl
 *
 * @author Ignacio
 */
include_once 'SexoDao.php';
include_once '../sql/ClasePDO.php';

class SexoDaoImpl extends SexoDao {

    public static function IntToString($int) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT descripcion FROM SEXO WHERE ID_SEXO=?");

            $stmt->bindParam(1, $int);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    return $value["descripcion"];
                }
            } else {
                $pdo = null;
                return;
            }
            $pdo = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function StringToInt($string) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_sexo FROM SEXO WHERE DESCRIPCION=?");

            $stmt->bindParam(1, $string);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    $pdo = null;
                    return $value["id_sexo"];
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
