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

abstract class SolicitudDao implements BaseDao, ConversionDao {

    public abstract static function listarSolicitudes();

    public abstract static function NombrePorId($id);
    
    public abstract static function BuscarPorRut($rut);
    public abstract static function BuscarPorFecha($ini, $fin);
    

    
    
}
