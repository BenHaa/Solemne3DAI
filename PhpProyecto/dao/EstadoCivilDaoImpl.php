<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstadoCivilDaoImpl
 *
 * @author Ignacio
 */
include_once 'EstadoCivilDao.php';
include_once '../sql/ClasePDO.php';

class EstadoCivilDaoImpl extends EstadoCivilDao {

    //put your code here
    public static function IntToString($int) {
          try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT descripcion FROM ESTADO_CIVIL WHERE ID_EST_CIVIL=?");

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
            $stmt = $pdo->prepare("SELECT id_est_civil FROM ESTADO_CIVIL WHERE DESCRIPCION=?");

            $stmt->bindParam(1, $string);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    $pdo = null;
                    return $value["id_est_civil"];
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
