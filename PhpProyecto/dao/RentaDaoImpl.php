<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RentaDaoImpl
 *
 * @author Ignacio
 */
include_once 'RentaDao.php';
include_once '../sql/ClasePDO.php';

class RentaDaoImpl extends RentaDao {

    //put your code here
    public static function IntToString($int) {
        
    }

    public static function StringToInt($string) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_renta FROM TIPO_RENTA WHERE DESCRIPCION=?");

            $stmt->bindParam(1, $string);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    $pdo = null;
                    return $value["id_renta"];
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
