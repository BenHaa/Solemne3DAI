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
                $lista->append(utf8_encode($comuna["descripcion"]));
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
            foreach ($rs as $educacion) {
                $lista->append(utf8_encode($educacion["descripcion"]));
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
            foreach ($rs as $civil) {
                $lista->append(utf8_encode($civil["descripcion"]));
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
            foreach ($rs as $renta) {
                $lista->append(utf8_encode($renta["descripcion"]));
            }
            $clasePdo = null;
            return $lista;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
            return $lista;
        }
    }

    public static function listarSexo() {
        $lista = new ArrayObject();
        try {
            $clasePdo = new clasePDO();
            $query = "select descripcion from sexo";
            $stmt = $clasePdo->prepare($query);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            foreach ($rs as $sexo) {
                $lista->append(utf8_encode($sexo["descripcion"]));
            }
            $clasePdo = null;
            return $lista;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
            return $lista;
        }
    }

}
