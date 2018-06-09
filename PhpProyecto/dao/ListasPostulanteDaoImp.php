<?php

include_once '../sql/ClasePDO.php';
include_once 'Listados.php';

class ListasPostulanteDaoImp implements Listados {

    public static function listarComunas() {
        $lista = new ArrayObject();
        try {
            $clasePdo = new clasePDO();
            $query = "select descripcion from comuna order by descripcion asc";
            $stmt = $clasePdo->prepare($query);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $comuna) {
                $lista->append($comuna["descripcion"]);
            }
            $clasePdo = null;
            return $lista;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
            return $lista;
        }
        
    }

    public static function listarEducacion() {
        $lista = new ArrayObject();
        try {
            $clasePdo = new clasePDO();
            $query = "select descripcion from nivel_educacion";
            $stmt = $clasePdo->prepare($query);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $comuna) {
                $lista->append($comuna["descripcion"]);
            }
            $clasePdo = null;
            return $lista;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
            return $lista;
        }
    }

    public static function listarEstadoCivil() {
        $lista = new ArrayObject();
        try {
            $clasePdo = new clasePDO();
            $query = "select descripcion from estado_civil";
            $stmt = $clasePdo->prepare($query);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $comuna) {
                $lista->append($comuna["descripcion"]);
            }
            $clasePdo = null;
            return $lista;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
            return $lista;
        }
    }

    public static function listarRenta() {
        $lista = new ArrayObject();
        try {
            $clasePdo = new clasePDO();
            $query = "select descripcion from tipo_renta";
            $stmt = $clasePdo->prepare($query);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $comuna) {
                $lista->append($comuna["descripcion"]);
            }
            $clasePdo = null;
            return $lista;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
            return $lista;
        }
    }

}
