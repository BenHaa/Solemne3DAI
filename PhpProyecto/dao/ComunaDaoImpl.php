<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunaDaoImpl
 *
 * @author Ignacio
 */
include_once '../dao/ComunaDao.php';
include_once '../sql/ClasePDO.php';

class ComunaDaoImpl extends ComunaDao {

    //put your code here
    public static function IntToString($int) {
        
    }

    public static function StringToInt($string) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_comuna FROM COMUNA WHERE DESCRIPCION=?");

            $stmt->bindParam(1, $string);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    return $value["id_comuna"];
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

}
