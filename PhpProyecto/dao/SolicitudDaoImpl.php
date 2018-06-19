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
include_once '../dto/SolicitudDto.php';
include_once 'SolicitudDao.php';
include_once '../sql/ClasePDO.php';
include_once 'EstadoDaoImpl.php';
include_once '../dto/SolicitudPorRutDto.php';

class SolicitudDaoImpl implements SolicitudDao {

    public static function ActualizarObjeto($dto) {
        
    }

    public static function EliminarObjeto($id) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("DELETE FROM POSTULACION WHERE ID_SOLICITUD=?");

            $stmt->bindParam(1, $id);

            if ($stmt->execute()) {
                $pdo = null;
                return true;
            } else {
                $pdo = null;
                return;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //Se obtendrá el rut del postulante mediante el id de postualante en la solicitud
    public static function IntToString($int) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT rut_postulante FROM POSTULANTE JOIN POSTULACION ON POSTULACION.ID_POSTULANTE = POSTULANTE.ID_POSTULANTE
                WHERE POSTULACION.ID_POSTULANTE=?");
            $stmt->bindParam(1, $int);

            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    $pdo = null;
                    return $value["rut_postulante"];
                }
            } else {
                $pdo = null;
                return;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function LeerObjeto($id) {
        
    }

    public static function StringToInt($string) {
        
    }

    public static function agregarObjeto($dto) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO POSTULACION(id_postulante, estado_solicitud, fecha_registro) VALUES(?, ?, now())");

            $idP = $dto->getIdPostulante();
            $idE = $dto->getIdEstado();

            $stmt->bindParam(1, $idP);
            $stmt->bindParam(2, $idE);

            if ($stmt->execute()) {
                $pdo = null;
                return true;
            } else {
                $pdo = null;
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function listarSolicitudes() {
        $lista = new ArrayObject();

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM POSTULACION");

            $stmt->execute();
            $resultado = $stmt->fetchAll();



            foreach ($resultado as $solicitud) {

                $dto = new SolicitudDto();
                $dto->setIdEstado($solicitud["estado_solicitud"]);
                $dto->setFechaRegistro($solicitud["fecha_registro"]);
                $dto->setIdPostulante($solicitud["id_postulante"]);
                $dto->setIdSolicitud($solicitud["id_solicitud"]);

                $lista->append($dto);
            }
            $pdo = null;
        } catch (SQLException $exc) {
            echo "Error sql al listar solicitudes: " . $exc->getTraceAsString();
        } catch (Exception $e) {

            echo "Error al listar solicitudes: " . $e->getTraceAsString();
        }
        return $lista;
    }

    public static function NombrePorId($id) {

        try {
            $pdo = new clasePDO();

            $stmt = $pdo->prepare("SELECT PERSONA.NOMBRE FROM POSTULANTE JOIN POSTULACION ON POSTULACION.ID_POSTULANTE = POSTULANTE.ID_POSTULANTE
            JOIN PERSONA ON PERSONA.RUT= POSTULANTE.RUT_POSTULANTE WHERE POSTULACION.ID_POSTULANTE=?");

            $stmt->bindParam(1, $id);


            if ($stmt->execute()) {
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $value) {
                    return $value["NOMBRE"];
                }
            } else {
                return;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function BuscarPorFecha($ini, $fin) {
        $lista = new ArrayObject();

        try {
            $pdo = new clasePDO();
            $query = "SELECT estado_solicitud, fecha_registro, POSTULACION.id_postulante, id_solicitud FROM POSTULACION JOIN POSTULANTE ON POSTULACION.ID_POSTULANTE = POSTULANTE.ID_POSTULANTE
            WHERE POSTULACION.ID_POSTULANTE = POSTULANTE.ID_POSTULANTE AND fecha_registro BETWEEN ? AND ? ";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $ini);
            $stmt->bindParam(2, $fin);

            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $solicitud) {
                $dto = new SolicitudDto();
                $dto->setIdEstado($solicitud["estado_solicitud"]);
                $dto->setFechaRegistro($solicitud["fecha_registro"]);
                $dto->setIdPostulante($solicitud["id_postulante"]);
                $dto->setIdSolicitud($solicitud["id_solicitud"]);
                $lista->append($dto);
            }
            $pdo = null;
        } catch (SQLException $exc) {
            echo "Error sql al listar solicitudes: " . $exc->getTraceAsString();
        } catch (Exception $e) {

            echo "Error al listar solicitudes: " . $e->getTraceAsString();
        }
        return $lista;
    }

    public static function BuscarPorRut($rut) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $query = "SELECT estado_solicitud, fecha_registro, POSTULACION.id_postulante, id_solicitud FROM POSTULACION JOIN POSTULANTE ON POSTULACION.ID_POSTULANTE = POSTULANTE.ID_POSTULANTE
            WHERE POSTULACION.ID_POSTULANTE = POSTULANTE.ID_POSTULANTE AND POSTULANTE.RUT_POSTULANTE=?";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(1, $rut);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $solicitud) {

                $dto = new SolicitudDto();
                $dto->setIdEstado($solicitud["estado_solicitud"]);
                $dto->setFechaRegistro($solicitud["fecha_registro"]);
                $dto->setIdPostulante($solicitud["id_postulante"]);
                $dto->setIdSolicitud($solicitud["id_solicitud"]);

                $lista->append($dto);
            }
            $pdo = null;
        } catch (SQLException $exc) {
            echo "Error sql al listar solicitudes: " . $exc->getTraceAsString();
        } catch (Exception $e) {

            echo "Error al listar solicitudes: " . $e->getTraceAsString();
        }
        return $lista;
    }

    //Verifica que el postulante no haya hecho una solicitud previamente
    public static function ExisteSolicitudPostulante($rut) {

        try {
            $pdo = new clasePDO();

            $stmt = $pdo->prepare("SELECT * FROM POSTULACION JOIN POSTULANTE ON POSTULACION.ID_POSTULANTE=POSTULANTE.ID_POSTULANTE WHERE RUT_POSTULANTE=?"
            );
            $stmt->bindParam(1, $rut);

            if ($stmt->execute()) {
                $lista = $stmt->fetchAll();                
                if (!empty($lista)) {
                    $pdo = null;
                    return true;
                } else {
                    $pdo = null;
                    return false;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function ActualizarEstado($id_estado, $id_solicitud) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE POSTULACION SET ESTADO_SOLICITUD=? WHERE ID_SOLICITUD=?");
            $stmt->bindParam(1, $id_estado);
            $stmt->bindParam(2, $id_solicitud);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $pdo = null;
                return true;
            } else {
                $pdo = null;
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return false;
    }

}
