<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstadoDaoImpl
 *
 * @author Ignacio
 */
include_once 'EstadoDao.php';

class EstadoDaoImpl implements EstadoDao {

    //put your code here
    public static function IntToString($int) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DESCRIPCION FROM ESTADO_SOLICITUD WHERE ID_ESTADO=?");
            $stmt->bindParam(1, $int);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                //Se indica el return debido a que retorna sólo un valor
                foreach ($resultado as $value) {
                    $pdo = null;
                    return $value["DESCRIPCION"];
                }
            } else {
                $pdo = null;
                return;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function StringToInt($string) {
        
    }

}
