<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudDaoImpl
 *
 * @author CETECOM
 */
include_once 'BaseDao.php';
include_once 'ConversionDao.php';
include_once '../sql/ClasePDO.php';

class SolicitudDaoImpl extends SolicitudDao {

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
        
    }

    public static function listarSolicitudes() {
        $lista = new ArrayObject();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM POSTULACION");

            $resultado = $stmt->fetchAll();

            $stmt->execute();

            foreach ($resultado as $solicitud) {
                $dto = new SolicitudDto();
                $dto->setIdEstado($solicitud["estado_solicitud"]);
                $dto->setFechaRegistro($solicitud["fecha_registro"]);
                $dto->setIdPostulante($solicitud["id_postulante"]);
                $dto->setIdSolicitud($solicitud["id_solicitud"]);
                $lista->append($dto);
            }
            return $lista;
        } catch (SQLException $exc) {
            echo "Error sql al listar solicitudes: " . $exc->getTraceAsString();
        } catch (Exception $e) {

            echo "Error al listar solicitudes: " . $e->getTraceAsString();
        }
    }

}
