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
include_once '../dto/ComunaDto.php';
include_once '../sql/ClasePDO.php';

class ComunaDaoImpl implements ComunaDao {

    //put your code here
    public static function IntToString($int) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT descripcion FROM COMUNA WHERE ID_COMUNA=?");

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

    public static function AutoCompletadoComuna($string) {
        $lista = new ArrayObject();

        try {

            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT descripcion FROM COMUNA WHERE DESCRIPCION LIKE ?");
            $search = $string . '%';
            $stmt->bindParam(1, $search);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();


                foreach ($resultado as $value) {
                    $lista->append(utf8_encode($value['descripcion']));
                }
                $pdo = null;
            } else {
                $pdo = null;
                return;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $lista;
    }

}
