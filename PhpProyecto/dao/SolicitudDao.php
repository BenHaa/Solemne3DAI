<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudDao
 *
 * @author CETECOM
 */
include_once 'BaseDao.php';
include_once 'ConversionDao.php';

interface SolicitudDao extends BaseDao, ConversionDao {

    public static function listarSolicitudes();

    public static function NombrePorId($id);

    public static function BuscarPorRut($rut);

    public static function BuscarPorFecha($ini, $fin);

    public static function ExisteSolicitudPostulante($rut);
    
    public static function ActualizarEstado($id_estado, $id_solicitud);
    
    
    
}
